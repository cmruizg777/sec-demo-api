<?php

namespace App\Controller;


use App\Entity\Foto;
use App\Entity\Reporte;
use App\Entity\TipoReporte;
use App\Entity\Ubicacion;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;

/**
 * Class ReporteController
 *
 * @Route("/api/v1/reporte")
 */
class ReporteController extends AbstractController
{

    /**
     * @Rest\Post("/entrada", name="reportar")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="descripcion",in="body",type="string")
     * @SWG\Parameter(name="latitud",in="body",type="float")
     * @SWG\Parameter(name="longitud",in="body",type="float")
     * @SWG\Parameter(name="precisiongps",in="body",type="float")
     * @SWG\Parameter(name="velocidad",in="body",type="float")
     * @SWG\Tag(name="entrada")
     */
    public function entradaAction(Request $request){
        $id = 0;
        $mensaje = 'Su reporte se ha guardado con éxito';
        $descripcion = $request->request->get('descripcion');
        /* @var $user Usuario */
        $user = $this->getUser();
        if($user){
            $em = $this->getDoctrine()->getManager();
            /* @var $tipo TipoReporte */
            $tipo = $em->getRepository('App:TipoReporte')->findOneByCodigo(Reporte::ENTRADA);
            if($tipo){
                $reporte = new Reporte();
                $reporte->setUsuario($user);
                $reporte->setTipo($tipo);
                $reporte->setDescripcion($descripcion);
                $user->addReporte($reporte);
                $tipo->addReporte($reporte);
                $latitud = $request->request->get('latitud');
                $longitud = $request->request->get('longitud');
                if($latitud && $longitud){
                    $velocidad = $request->request->get('velocidad');
                    $presicion = $request->request->get('precisiongps');
                    $ubicacion = new Ubicacion();
                    $ubicacion->setLatitud($latitud);
                    $ubicacion->setLongitud($longitud);
                    $ubicacion->setPrecisiongps($presicion);
                    $ubicacion->setVelocidad($velocidad);
                    $reporte->setUbicacion($ubicacion);
                }else{
                    $mensaje = 'Su reporte ha sido guardado, pero sin ninguna ubicación';
                }
                try{
                    $em->persist($reporte);
                    $em->flush();
                    $id = $reporte->getId();
                }catch (\Exception $ex){
                    $mensaje = 'No ha sido posible guardar su reporte. Error : '.$ex->getMessage();
                }
            }else{
                $mensaje = 'Error en el tipo de reporte, contactese con soporte técnico.';
            }
        }else{
            $mensaje = 'Por favor, vuelva a iniciar sesión e intentelo nuevamente.';
        }
        $serializer = $this->get('serializer');
        $response = [
            'mensaje'=>$mensaje,
            'id'=>$id,
        ];
        return new Response($serializer->serialize($response, "json"));
    }
    /**
     * @Rest\Post("/upload/{id}", name="upload_photo")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="file",in="body",type="blob")
     * @SWG\Parameter(name="extension",in="body",type="string")
     * @SWG\Tag(name="uploadfoto")
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