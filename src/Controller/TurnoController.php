<?php

namespace App\Controller;

use App\Entity\Horario;
use App\Entity\Turno;
use App\Entity\Usuario;
use App\Repository\HorarioRepository;
use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;

/**
 * Class TurnoController
 *
 * @Route("/api/v1/turno")
 */
class TurnoController extends AbstractController
{

    public function turnoCreate(Request $request){
        $user = $this->getUser();
        $roles = $user->getRoles();
        $role_admin = 'ROLE_ADMIN';
        $is_admin = in_array($role_admin, $roles);
        if($is_admin){

        }
    }
    /**
     * @Rest\Post("/horario/new", name="new_horario")
     *
     * @SWG\Response(
     *     response=201,
     *     description="Schedule was successfully created"
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="Schedule was not successfully created"
     * )
     *
     * @SWG\Parameter(
     *     name="_hora",
     *     in="body",
     *     type="time",
     *     description="hora",
     *     schema={}
     * )
     *
     * @SWG\Tag(name="Horario")
     */
    public function scheduleCreateAction(Request $request) {
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();
        $schedule = [];
        $message = "";

        try {
            $code = 200;
            $error = false;

            $hora = $request->request->get('_hora');

            $schedule = new Horario();
            $schedule->setHora(new \DateTime($hora));

            $em->persist($schedule);
            $em->flush();

        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to create the schedule - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $schedule : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }
    /**
     * @Rest\Get("/info", name="horarios_list")
     *
     * @SWG\Response(
     *     response=201,
     *     description="Schedules was successfully sended"
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="Schedule was not successfully sended"
     * )
     * @SWG\Parameter(
     *     name="_fecha",
     *     in="body",
     *     type="datetime",
     *     description="fecha",
     *     schema={}
     * )
     */
    public function getInfoTurnoByDate(Request $request){

        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();
        $message = "";
        // array de respuesta, con la información de estado de cada uno de los horarios
        $horarios_info = [];
        try {
            $code = 200;
            $error = false;
            // fecha del día que solicita el turno
            $fecha = $request->request->get('_fecha');
            // Los turno reservados para ese día
            $turnos = $em->getRepository('App:Turno')->findByFecha(new \DateTime($fecha));
            // todos los horarios disponibles
            $horarios_list = $em->getRepository('App:Horario')->findAll();

            /* @var $horario Horario */
            foreach ($horarios_list as $horario){
                // se asume por defecto que el estado del horario es libre
                $free = true;
                /* @var $turno Turno */
                foreach ($turnos as $turno){
                    if($horario == $turno->getHorario()){
                        // en caso de que uno de los turnos tenga asignado el horario concurrente, el estado de la respuesta indicará que está ocupado
                        $free = false;
                    }
                }
                // se concatena un horario con su respectiva información de estado en el array de respuesta
                $horario_info = ['horario'=>$horario->getHora()->format('H:i'), 'libre'=>$free];
                $horarios_info[] = $horario_info;
            }
        } catch ( \Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying getting schedules - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $horarios_info : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }
    private function getSchedulesList() {
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();
        $message = "";
        $schedules = [];
        try {
            $code = 200;
            $error = false;
            $schedules = $em->getRepository('App:Horario')->findAll();


        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying getting schedules - Error: {$ex->getMessage()}";
        }

        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $schedules : $message,
        ];

        return new Response($serializer->serialize($response, "json"));
    }

}
