<?php

namespace App\Controller;

use App\Entity\Foto;
use App\Entity\Personal;
use App\Entity\Provincia;
use App\Entity\Reporte;
use App\Entity\Usuario;
use App\Entity\Zona;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Serializer;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Stream;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

/**
 * Class UsuarioController
 *
 * @Route("/api/user")
 */
class UsuarioController extends AbstractController
{

    /**
     * @Rest\Post("/login_check", name="user_login_check")
     *
     * @SWG\Response(
     *     response=200,
     *     description="User was logged in successfully"
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="User was not logged in successfully"
     * )
     *
     * @SWG\Parameter(
     *     name="_username",
     *     in="body",
     *     type="string",
     *     description="The username",
     *     schema={
     *     }
     * )
     *
     * @SWG\Parameter(
     *     name="_password",
     *     in="body",
     *     type="string",
     *     description="The password",
     *     schema={}
     * )
     *
     * @SWG\Tag(name="Usuario")
     */
    public function getLoginCheckAction() {}

    /**
     * @Rest\Post("/register", name="user_register")
     *
     * @SWG\Response(response=201,description="User was successfully registered")
     * @SWG\Response(response=500,description="User was not successfully registered")
     * @SWG\Parameter(name="_username",in="body",type="string",description="The username",schema={})
     * @SWG\Parameter(name="_password",in="query",type="string",description="The password")
     * @SWG\Tag(name="Usuario")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder) {
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();

        $user = [];
        $message = "";

        try {
            $code = 200;
            $error = false;

            $name = $request->request->get('_name');
            $email = $request->request->get('_email');
            $username = $request->request->get('_username');
            $password = $request->request->get('_password');

            $user = new Usuario();
            $user->setName($name);
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setPlainPassword($password);
            $user->setPassword($encoder->encodePassword($user, $password));

            $em->persist($user);
            $em->flush();

        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to register the user - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $user : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }
    /**
     * @Rest\Post("/profile", name="user_profile")
     * @SWG\Response(response=201,description="OK")
     * @SWG\Response(response=500,description="ERROR")
     * @SWG\Tag(name="Usuario_Profile")
     */
    public function profileAction(Request $request) {
        $serializer = $this->get('serializer');
        /* @var $user Usuario */
        $user = $this->getUser();

        $profile = false;
        $cargon = false;
        if($user){
            $em = $this->getDoctrine()->getManager();
            $id    = $user->getPerfil()->getIdCargo();
            $cargo = $em->getRepository('App:Cargos')->find($id);
            $profile = $serializer->normalize($user, null,
                [AbstractNormalizer::ATTRIBUTES =>
                    [
                        'id',
                        'username',
                        'perfil'=>[
                            'id_personal',
                            'nombres',
                            'apellidos'
                        ]]]);
            $cargon = $serializer->normalize($cargo, null,
                [AbstractNormalizer::ATTRIBUTES =>
                    [
                        'idCargo',
                        'nomCargo',
                        'textopararol'
                    ]
                ]);
        }
        $response = [
            'profile'=> $profile,
            'cargo'=>$cargon
        ];
        return new Response($serializer->serialize($response, "json"));
    }
    /**
     * @Rest\Get("/sincronizar", name="sincronizar_usuarios")
     * @SWG\Response(response=200,description="Sincronizacion exitoza")
     * @SWG\Response(response=500, description="Ha ocurrido un error")
     * @SWG\Parameter(name="limit",in="query",type="string",description="inicio id")
     * @SWG\Parameter(name="offset",in="query",type="string",description="fin id")
     * @SWG\Tag(name="sincronizarusuarios")
     */
    public function sincronizarAction(Request $request, UserPasswordEncoderInterface $encoder) {
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get('limit');
        $offset = $request->get('offset');
        $empleados = $em->getRepository('App:Personal')->findBy(
            array(),
            array('idPersonal' => 'DESC'),
            $limit,
            $offset
        );
        $contador = 0;
        $errores_ci = [];
        $mensaje = '';
        $transaccion = [];
        $usuarios_existentes=[];
        try {
            $contadorInserts = 0;
            /* @var $empleado Personal */
            foreach ($empleados as $empleado){
                $user = new Usuario();
                $user->setUsername($empleado->getCedula());

                $exist2 = $em->getRepository('App:Usuario')->findBy(['username'=>$user->getUsername()]);
                $exist = array_search($user->getUsername(), $transaccion);
                if(!$exist2 && $exist === false ){
                    $pass = '123456';
                    $idcargo = $empleado->getIdCargo();
                    $roles = [];
                    if($idcargo == 10){
                        $roles[]='ROLE_GUARDIA';
                    }
                    if($idcargo == 11){
                        $roles[]='ROLE_SUPERVISOR';
                    }
                    $user->setRoles($roles);
                    $user->setCreatedAt(new \DateTime('now'));
                    $user->setPerfil($empleado);
                    $user->setPassword($encoder->encodePassword($user, $pass));
                    $em->persist($user);
                    $contadorInserts++;
                    $transaccion[] = $user->getUsername();
                    $em->flush();

                }else{
                    $usuarios_existentes[] = $user->getUsername();
                    $contador++;
                }
            }
        }catch (\Exception $ex){
            $mensaje = $ex->getMessage();
        }
        $response = [
            'numero de errores' => $contador,
            'usuarios_existente' => $usuarios_existentes,
            'excepcion' => $mensaje
        ];
        return new Response($serializer->serialize($response, "json"));
    }

    /**
     * @Rest\Get("/download", name="down_photo")
     * @SWG\Response(response=200,description="OK")
     * @SWG\Response(response=500, description="ERROR")
     * @SWG\Parameter(name="id",in="body",type="id")
     * @SWG\Tag(name="downloadfoto")
     */
    public function downloadReporteAction(Request $request){
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
}


/*
            $zonas = [
                "ZONA 1:Esmeraldas,Carchi,Imbabura,Sucumbíos",
                "ZONA 2:Pichincha,Napo,Orellana",
                "ZONA 3:Chimborazo,Tungurahua,Pastaza,Cotopaxi",
                "ZONA 4:Manabí,Galápagos,Santo Domingo de los Tsachilas",
                "ZONA 5:Santa Elena,Guayas,Los Ríos,Bolívar",
                "ZONA 6:Cañar,Azuay,Morona Santiago",
                "ZONA 7:El Oro,Loja,Zamora Chinchipe"
            ];
            foreach ($zonas as $zona){
                $aZona = explode(':', $zona);
                $zonaObj = new Zona();
                $zonaObj->setNombre($aZona[0]);
                $provincias = explode(',', $aZona[1]);
                $em->persist($zonaObj);
                $em->flush();;
                foreach ($provincias as $provincia){
                    $provObj = new Provincia();
                    $provObj->setNombre($provincia);
                    $provObj->setZona($zonaObj);
                    $zonaObj->addProvincia($provObj);
                    $em->persist($provObj);
                    $em->flush();
                }
            }
*/