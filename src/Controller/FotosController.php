<?php


namespace App\Controller;


use App\Entity\Foto;
use App\Entity\Reporte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FotosController
 *
 * @Route("/api/v1/fotos")
 */

class FotosController extends AbstractController
{
    /**
     * @Rest\Get("/download", name="down_photo")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="id",in="query",type="integer", description="El id de la foto solicitada")
     * @SWG\Tag(name="Descargar Foto")
     */
    public function downloadAction(Request $request){
        $id = $request->get('id');
        $mensaje = 'OK';
        $data = [];
        if($id){
            try{
                $entityManager = $this->getDoctrine()->getManager();
                /* @var $foto Foto */
                $foto = $entityManager->getRepository('App:Foto')->find($id);
                if($foto){
                    $data = $foto->getData();
                    $response = new Response(stream_get_contents($data));
                    $filename = $foto->getId().'.'.$foto->getExtension();
                    $disposition = HeaderUtils::makeDisposition(
                        HeaderUtils::DISPOSITION_ATTACHMENT,
                        $filename
                    );

                    $response->headers->set('Content-Disposition', $disposition);

                    return $response;
                }
            }catch (\Exception $ex){
                throw($ex);
            }
        }else{
            $mensaje = 'Ningun archivo recibido';
        }
        $serializer = $this->get('serializer');
        $response = [
            'mensaje'=>$mensaje,
            'data'=> $data
        ];
        return new Response($serializer->serialize($response, "json"));
    }
    /**
     * @Rest\Post("/upload/{id}", name="upload_photo")
     * @SWG\Response(response=200, description="Devuelve un mensaje de OK")
     * @SWG\Response(response=500, description="Devuelve un mensaje con la descripcion del error")
     * @SWG\Parameter(name="file",in="body", @SWG\Schema(type="file"))
     * @SWG\Parameter(name="extension",in="body", @SWG\Schema(type="string"))
     * @SWG\Tag(name="Cargar Foto")
     */
    public function uploadReporteAction(Request $request, Reporte $reporte){
        $file = $request->files->get('file');
        $mensaje = 'OK';
        if($file){
            try{
                $foto = new Foto();
                $entityManager = $this->getDoctrine()->getManager();
                $strm = fopen($file->getRealPath(),'rb');
                $foto->setData(stream_get_contents($strm));
                $ext = $request->request->get('extension');
                $foto->setReporte($reporte);
                $reporte->addFoto($foto);

                if($ext){
                    $foto->setExtension($ext);
                }
                $entityManager->persist($foto);
                $entityManager->flush();
            }catch (\Exception $ex){
                $mensaje = 'Ha ocurrido un error: '.$ex->getMessage();
            }
        }else{
            $mensaje = 'No se recibió ningún archivo o reporte.';
        }
        $serializer = $this->get('serializer');
        $response = [
            'mensaje'=>$mensaje
        ];
        return new Response($serializer->serialize($response, "json"));
    }
}