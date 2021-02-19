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
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

/**
 * Class PuestosController
 *
 * @Route("/api/v1/puestos")
 */
class PuestosController extends AbstractController
{

    /**
     * @Rest\Get("/", name="get_puestos")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Tag(name="Obtener Asignaciones de puestos de Trabajo")
     */
    public function getPuestosAction(Request $request){
        $serializer = $this->get('serializer');
        /* @var $user Usuario */
        $user = $this->getUser();
        if($user){
            $em = $this->getDoctrine()->getManager();
            $asignaciones = $em->getRepository('App:Asignacion')->findByUser($user);
            $asignacionesSerialized = $serializer->normalize($asignaciones, null,
                [AbstractNormalizer::ATTRIBUTES =>
                    [
                        'id',
                        'puesto' => [
                            'nombre',
                            'provincia'=>[
                                'nombre'
                            ]
                        ],
                        'dias'=>[
                            'nombre'
                        ],
                        'horario'=>[
                            'entrada',
                            'salida'
                        ]
                    ]
                ]);
            return new Response($serializer->serialize($asignacionesSerialized, "json"));
        }else{
            $mensaje = 'Por favor, vuelva a iniciar sesión e intentelo nuevamente.';
        }


        $response = [
            'mensaje' => $mensaje
        ];
        return new Response($serializer->serialize($response, "json"));
    }

}