<?php

namespace App\Controller;


use App\Entity\Asignacion;
use App\Entity\Foto;
use App\Entity\PuestoTrabajo;
use App\Entity\Reporte;
use App\Entity\TipoReporte;
use App\Entity\Ubicacion;
use App\Entity\Usuario;
use Cassandra\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

/**
 * Class ReporteController
 *
 * @Route("/api/v1/reporte")
 */
class ReporteController extends AbstractController
{

    /**
     * @Rest\Post("/{id}", name="reportar")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="tipo",in="body", @SWG\Schema(type="string"))
     * @SWG\Parameter(name="descripcion",in="body", @SWG\Schema(type="string"))
     * @SWG\Parameter(name="latitud",in="body", @SWG\Schema(type="float"))
     * @SWG\Parameter(name="longitud",in="body", @SWG\Schema(type="float"))
     * @SWG\Parameter(name="precisiongps",in="body", @SWG\Schema(type="float"))
     * @SWG\Parameter(name="velocidad",in="body", @SWG\Schema(type="float"))
     * @SWG\Tag(name="Generar Reporte")
     */
    public function newReporteAction(Request $request, PuestoTrabajo $puesto){
        $id = 0;
        $mensaje = 'Su reporte se ha guardado con éxito';
        $descripcion = $request->request->get('descripcion');
        $strTipo = $request->request->get('tipo');
        /* @var $user Usuario */
        $user = $this->getUser();
        if($user && $puesto && $strTipo){
            $em = $this->getDoctrine()->getManager();
            /* @var $tipo TipoReporte */
            $tipo = $em->getRepository('App:TipoReporte')->findOneByCodigo($strTipo);
            if($tipo){
                $reporte = new Reporte();
                $reporte->setUsuario($user);
                $reporte->setTipo($tipo);
                $reporte->setDescripcion($descripcion);
                $reporte->setFecha(new \DateTime('now', new \DateTimeZone('America/Guayaquil')));
                $reporte->setHora(new \DateTime('now', new \DateTimeZone('America/Guayaquil')));
                $user->addReporte($reporte);
                $tipo->addReporte($reporte);
                $reporte->setPuesto($puesto);
                $puesto->addReporte($reporte);
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
     * @Rest\Get("/{id}", name="get_reportes")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="id",in="query", description="Id del puesto de trabajo")
     * @SWG\Parameter(name="fecha",in="query", description="fecha de los reportes")
     * @SWG\Tag(name="Obtener Reportes del puesto")
     */
    public function getReportesAction(Request $request, PuestoTrabajo $puesto){
        $serializer = $this->get('serializer');
        $strfecha =  $request->get('fecha');
        if($puesto && $strfecha){
            $em = $this->getDoctrine()->getManager();
            $fecha =  new \DateTime($strfecha, new \DateTimeZone('America/Guayaquil'));
            $reportes = $em->getRepository('App:Reporte')->findBy(['puesto'=>$puesto, 'fecha'=>$fecha]);
            $data = $serializer->normalize($reportes, null,
                [AbstractNormalizer::ATTRIBUTES =>
                    [
                        'id',
                        'fecha',
                        'hora',
                        'tipo'=>[
                            'codigo',
                            'nombre'
                        ],
                        'usuario'=>[
                            'nombreCompleto'
                        ]
                    ]
                ]);
            return new Response($serializer->serialize($data, "json"));
            return new Response($serializer->serialize($data, "json"));
        }else{
            $mensaje = 'No se ha encontrado el puesto de trabajo.';
        }
        return new Response($serializer->serialize($mensaje, "json"));
    }
    /**
     * @Rest\Get("/detalles/{id}", name="get_reporte")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="id",in="query", description="Id del reporte solicitado")
     * @SWG\Tag(name="Obtener un reporte específico")
     */
    public function getReporteAction(Request $request, Reporte $reporte){
        $serializer = $this->get('serializer');
        if($reporte){

            $data = $serializer->normalize($reporte, null,
                [AbstractNormalizer::ATTRIBUTES =>
                    [
                        'id',
                        'fecha',
                        'hora',
                        'tipo'=>[
                            'codigo',
                            'nombre'
                        ],
                        'usuario'=>[
                            'nombreCompleto'
                        ],
                        'ubicacion'=>[
                            'latitud','longitud'
                        ],
                        'fotos'=>[
                            'id',
                            'extension'
                        ],
                        'descripcion',
                        'puesto'=>[
                            'nombre',
                            'ubicacion',
                            'cliente'=>[
                                'nombre'
                            ]
                        ]
                    ]
                ]);
            return new Response($serializer->serialize($data, "json"));
        }else{
            $mensaje = 'No se ha encontrado el reporte solicitado.';
        }
        return new Response($serializer->serialize($mensaje, "json"));
    }
}