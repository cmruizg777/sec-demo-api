<?php

namespace App\Controller;

use App\Entity\Personal;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
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
     *     description="Devuelve un token",
     *     @SWG\Schema(
     *          type="string",
     *          @SWG\Items(title = "token", format="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzUxMiJ9.eyJpYXQiOjE2MTM2ODQ4MTgsImV4cCI6MTYxMzY4ODQxOCwicm9sZXMiOltdLCJ1c2VybmFtZSI6IjEwMDM2NTk5...")
     *     )
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="El usuario no se pudo loguear"
     * )
     *
     * @SWG\Parameter(
     *     name="username",
     *     in="body",
     *     type="string",
     *     description="The username",
     *     schema={
     *     }
     * )
     *
     * @SWG\Parameter(
     *     name="password",
     *     in="body",
     *     type="string",
     *     description="The password",
     *     schema={}
     * )
     *
     * @SWG\Tag(name="Iniciar Sesión")
     */
    public function getLoginCheckAction() {

    }

    //**
     //* @Rest\Post("/register", name="user_register")
     //*
     //* @SWG\Response(response=201,description="User was successfully registered")
     //* @SWG\Response(response=500,description="User was not successfully registered")
     //* @SWG\Parameter(name="_username",in="body",type="string",description="The username",schema={})
     //* @SWG\Parameter(name="_password",in="query",type="string",description="The password")
     //* @SWG\Tag(name="Usuario")
     //*/
    /*
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
    }*/
    /**
     * @Rest\Post("/profile", name="user_profile")
     * @SWG\Response(
     *     response=200,
     *     description="Returns the rewards of an user",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Usuario::class))
     *     )
     * )
     * @SWG\Response(response=500,description="ERROR")
     * @SWG\Tag(name="Perfil del Usuario")
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


///**
 //* @Rest\Get("/sincronizar", name="sincronizar_usuarios")
 //* @SWG\Response(response=200,description="Sincronizacion exitoza")
 //* @SWG\Response(response=500, description="Ha ocurrido un error")
 //* @SWG\Parameter(name="limit",in="query",type="string",description="inicio id")
 //* @SWG\Parameter(name="offset",in="query",type="string",description="fin id")
 //* @SWG\Tag(name="sincronizarusuarios")
 //*/
/*
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
}*/