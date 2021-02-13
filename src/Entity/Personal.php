<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Personal
 *
 * @ORM\Table(name="personal")
 * @ORM\Entity(repositoryClass="App\Repository\PersonalRepository");
 */
class Personal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_personal", type="bigint", nullable=false)
     * @ORM\Id
     */
    private $idPersonal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="string", length=7, nullable=true, options={"default"="NULL"})
     */
    private $codigo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigoOLD", type="string", length=7, nullable=true, options={"default"="NULL"})
     */
    private $codigoold = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cedula", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $cedula = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="estadop", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $estadop = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $apellidos = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombres", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $nombres = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="estado_civ", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $estadoCiv = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sexo", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $sexo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="libreta_militar", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $libretaMilitar = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_sangre", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    private $tipoSangre = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaNacimiento = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="provincia_nacimiento", type="string", length=80, nullable=false)
     */
    private $provinciaNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad_nacimiento", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudadNacimiento = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="parroquia_nacimiento", type="string", length=80, nullable=false)
     */
    private $parroquiaNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="direccion", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $direccion = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="provincia_d", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $provinciaD = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad_d", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudadD = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="parroquia_d", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $parroquiaD = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="callePrincipal_d", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $calleprincipalD = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="calleSecundaria_d", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $callesecundariaD = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nro_Casa_d", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $nroCasaD = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad_v", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudadV = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $telefono = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="celular", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $celular = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="discapacidad", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $discapacidad = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="familia", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $familia = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_cuenta", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $tipoCuenta = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cuenta_bancaria", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $cuentaBancaria = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="id_banco", type="string", length=10, nullable=false, options={"default"="'0'"})
     */
    private $idBanco = '\'0\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="banco", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $banco = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tarjeta", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $tarjeta = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_ingreso", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaIngreso = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_salida", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaSalida = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="escuela", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $escuela = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="colegio", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $colegio = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="universidad", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $universidad = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cuarton", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $cuarton = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="idiomas", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $idiomas = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="otros", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $otros = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ingles", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $ingles = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="ingles_nivel", type="string", length=20, nullable=false)
     */
    private $inglesNivel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="computacion", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $computacion = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="computacion_nivel", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $computacionNivel = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="instruccion", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $instruccion = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $titulo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo2", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $titulo2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo3", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $titulo3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo4", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $titulo4 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo5", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $titulo5 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo6", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $titulo6 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad1", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudad1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad2", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudad2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad3", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudad3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad4", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudad4 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudadOtros", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudadotros = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cursomi", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $cursomi = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="licencia", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $licencia = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="licencia_FechaExp", type="date", nullable=true, options={"default"="NULL"})
     */
    private $licenciaFechaexp = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_cargo", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idCargo = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_sueldo", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idSueldo = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="sueldo", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $sueldo = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="bonificacion", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $bonificacion = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_bonificacion", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idBonificacion = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="movilizacion", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $movilizacion = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_movilizacion", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idMovilizacion = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="cargas", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $cargas = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="region", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $region = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_cliente", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idCliente = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_lugar", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idLugar = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="orden_lugart", type="integer", nullable=false)
     */
    private $ordenLugart;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudadt", type="string", length=80, nullable=true, options={"default"="NULL"})
     */
    private $ciudadt = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="orden_ciudadt", type="integer", nullable=false)
     */
    private $ordenCiudadt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="jornada", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $jornada = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="per_vacaciones1", type="date", nullable=true, options={"default"="NULL"})
     */
    private $perVacaciones1 = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="per_vacaciones2", type="date", nullable=true, options={"default"="NULL"})
     */
    private $perVacaciones2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="vacaciones", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $vacaciones = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true, options={"default"="NULL","comment"="fecha de registro"})
     */
    private $fecha = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_padre", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $nombrePadre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_madre", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $nombreMadre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="observaciones", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $observaciones = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="item", type="bigint", nullable=true, options={"default"="NULL"})
     */
    private $item = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="contrato", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $contrato = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="enrol", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $enrol = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="enanticipo", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $enanticipo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="retsueldo", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $retsueldo = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="gastos_deducibles", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $gastosDeducibles = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fondos_reserva", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $fondosReserva = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tallab", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $tallab = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tallau", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $tallau = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="he", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $he = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="multas", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $multas = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="faltas", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $faltas = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="the", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $the = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="tmultas", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $tmultas = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="tfaltas", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $tfaltas = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_costo", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tipoCosto = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="referencias", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $referencias = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="años", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $a�os = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="meses", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $meses = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="dias", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dias = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_dias", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $totalDias = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="carga", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $carga = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_gye", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idGye = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fec_update", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fecUpdate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fec_traspaso", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fecTraspaso = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $usuario = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_personal2", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idPersonal2 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_puesto", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idPuesto = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="firma", type="string", length=4, nullable=true, options={"default"="NULL"})
     */
    private $firma = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pasar", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    private $pasar = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="log_ing", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $logIng = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechai", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $fechai = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="log_upd", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $logUpd = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaupd", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $fechaupd = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ref1", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ref1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ref2", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ref2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ref3", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ref3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocup1", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ocup1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocup2", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ocup2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocup3", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ocup3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telrl1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $telrl1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telrl2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $telrl2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telrl3", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $telrl3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiemporl1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tiemporl1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiemporl2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tiemporl2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiemporl3", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tiemporl3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="refp1", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $refp1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="refp2", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $refp2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocupp1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $ocupp1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ocupp2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $ocupp2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telrp1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $telrp1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telrp2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $telrp2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiemporp1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tiemporp1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiemporp2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tiemporp2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="eme1", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $eme1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="eme2", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $eme2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pare1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $pare1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pare2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $pare2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tele1", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tele1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tele2", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $tele2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dire1", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $dire1 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dire2", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $dire2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="doc_escaneado", type="string", length=14, nullable=true, options={"default"="NULL"})
     */
    private $docEscaneado = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="motivo_salida", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $motivoSalida = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="estatura", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $estatura = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="peso", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $peso = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sector", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $sector = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="carnet_discap", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $carnetDiscap = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_discap", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $tipoDiscap = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="porcentaje", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $porcentaje = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_reg", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $numReg = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_expiracion", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaExpiracion = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo_dactilar", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $codigoDactilar = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaact", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $fechaact = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="dias1", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dias1 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="dias2", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dias2 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="dias3", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dias3 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="dias4", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $dias4 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $orden = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden2", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $orden2 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden3", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $orden3 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="restringir", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $restringir = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="periodo_activo", type="string", length=60, nullable=false)
     */
    private $periodoActivo;

    /**
     * @ORM\ManyToMany(targetEntity=PuestoTrabajo::class, mappedBy="personal")
     */
    private $puestos;

    public function __construct()
    {
        $this->puestos = new ArrayCollection();
    }


    public function getIdPersonal(): ?string
    {
        return $this->idPersonal;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCodigoold(): ?string
    {
        return $this->codigoold;
    }

    public function setCodigoold(?string $codigoold): self
    {
        $this->codigoold = $codigoold;

        return $this;
    }

    public function getCedula(): ?string
    {
        return $this->cedula;
    }

    public function setCedula(?string $cedula): self
    {
        $this->cedula = $cedula;

        return $this;
    }

    public function getEstadop(): ?string
    {
        return $this->estadop;
    }

    public function setEstadop(?string $estadop): self
    {
        $this->estadop = $estadop;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(?string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getEstadoCiv(): ?string
    {
        return $this->estadoCiv;
    }

    public function setEstadoCiv(?string $estadoCiv): self
    {
        $this->estadoCiv = $estadoCiv;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getLibretaMilitar(): ?string
    {
        return $this->libretaMilitar;
    }

    public function setLibretaMilitar(?string $libretaMilitar): self
    {
        $this->libretaMilitar = $libretaMilitar;

        return $this;
    }

    public function getTipoSangre(): ?string
    {
        return $this->tipoSangre;
    }

    public function setTipoSangre(?string $tipoSangre): self
    {
        $this->tipoSangre = $tipoSangre;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getProvinciaNacimiento(): ?string
    {
        return $this->provinciaNacimiento;
    }

    public function setProvinciaNacimiento(string $provinciaNacimiento): self
    {
        $this->provinciaNacimiento = $provinciaNacimiento;

        return $this;
    }

    public function getCiudadNacimiento(): ?string
    {
        return $this->ciudadNacimiento;
    }

    public function setCiudadNacimiento(?string $ciudadNacimiento): self
    {
        $this->ciudadNacimiento = $ciudadNacimiento;

        return $this;
    }

    public function getParroquiaNacimiento(): ?string
    {
        return $this->parroquiaNacimiento;
    }

    public function setParroquiaNacimiento(string $parroquiaNacimiento): self
    {
        $this->parroquiaNacimiento = $parroquiaNacimiento;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getProvinciaD(): ?string
    {
        return $this->provinciaD;
    }

    public function setProvinciaD(?string $provinciaD): self
    {
        $this->provinciaD = $provinciaD;

        return $this;
    }

    public function getCiudadD(): ?string
    {
        return $this->ciudadD;
    }

    public function setCiudadD(?string $ciudadD): self
    {
        $this->ciudadD = $ciudadD;

        return $this;
    }

    public function getParroquiaD(): ?string
    {
        return $this->parroquiaD;
    }

    public function setParroquiaD(?string $parroquiaD): self
    {
        $this->parroquiaD = $parroquiaD;

        return $this;
    }

    public function getCalleprincipalD(): ?string
    {
        return $this->calleprincipalD;
    }

    public function setCalleprincipalD(?string $calleprincipalD): self
    {
        $this->calleprincipalD = $calleprincipalD;

        return $this;
    }

    public function getCallesecundariaD(): ?string
    {
        return $this->callesecundariaD;
    }

    public function setCallesecundariaD(?string $callesecundariaD): self
    {
        $this->callesecundariaD = $callesecundariaD;

        return $this;
    }

    public function getNroCasaD(): ?string
    {
        return $this->nroCasaD;
    }

    public function setNroCasaD(?string $nroCasaD): self
    {
        $this->nroCasaD = $nroCasaD;

        return $this;
    }

    public function getCiudadV(): ?string
    {
        return $this->ciudadV;
    }

    public function setCiudadV(?string $ciudadV): self
    {
        $this->ciudadV = $ciudadV;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDiscapacidad(): ?string
    {
        return $this->discapacidad;
    }

    public function setDiscapacidad(?string $discapacidad): self
    {
        $this->discapacidad = $discapacidad;

        return $this;
    }

    public function getFamilia(): ?string
    {
        return $this->familia;
    }

    public function setFamilia(?string $familia): self
    {
        $this->familia = $familia;

        return $this;
    }

    public function getTipoCuenta(): ?string
    {
        return $this->tipoCuenta;
    }

    public function setTipoCuenta(?string $tipoCuenta): self
    {
        $this->tipoCuenta = $tipoCuenta;

        return $this;
    }

    public function getCuentaBancaria(): ?string
    {
        return $this->cuentaBancaria;
    }

    public function setCuentaBancaria(?string $cuentaBancaria): self
    {
        $this->cuentaBancaria = $cuentaBancaria;

        return $this;
    }

    public function getIdBanco(): ?string
    {
        return $this->idBanco;
    }

    public function setIdBanco(string $idBanco): self
    {
        $this->idBanco = $idBanco;

        return $this;
    }

    public function getBanco(): ?string
    {
        return $this->banco;
    }

    public function setBanco(?string $banco): self
    {
        $this->banco = $banco;

        return $this;
    }

    public function getTarjeta(): ?string
    {
        return $this->tarjeta;
    }

    public function setTarjeta(?string $tarjeta): self
    {
        $this->tarjeta = $tarjeta;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso(?\DateTimeInterface $fechaIngreso): self
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getFechaSalida(): ?\DateTimeInterface
    {
        return $this->fechaSalida;
    }

    public function setFechaSalida(?\DateTimeInterface $fechaSalida): self
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    public function getEscuela(): ?string
    {
        return $this->escuela;
    }

    public function setEscuela(?string $escuela): self
    {
        $this->escuela = $escuela;

        return $this;
    }

    public function getColegio(): ?string
    {
        return $this->colegio;
    }

    public function setColegio(?string $colegio): self
    {
        $this->colegio = $colegio;

        return $this;
    }

    public function getUniversidad(): ?string
    {
        return $this->universidad;
    }

    public function setUniversidad(?string $universidad): self
    {
        $this->universidad = $universidad;

        return $this;
    }

    public function getCuarton(): ?string
    {
        return $this->cuarton;
    }

    public function setCuarton(?string $cuarton): self
    {
        $this->cuarton = $cuarton;

        return $this;
    }

    public function getIdiomas(): ?string
    {
        return $this->idiomas;
    }

    public function setIdiomas(?string $idiomas): self
    {
        $this->idiomas = $idiomas;

        return $this;
    }

    public function getOtros(): ?string
    {
        return $this->otros;
    }

    public function setOtros(?string $otros): self
    {
        $this->otros = $otros;

        return $this;
    }

    public function getIngles(): ?string
    {
        return $this->ingles;
    }

    public function setIngles(?string $ingles): self
    {
        $this->ingles = $ingles;

        return $this;
    }

    public function getInglesNivel(): ?string
    {
        return $this->inglesNivel;
    }

    public function setInglesNivel(string $inglesNivel): self
    {
        $this->inglesNivel = $inglesNivel;

        return $this;
    }

    public function getComputacion(): ?string
    {
        return $this->computacion;
    }

    public function setComputacion(?string $computacion): self
    {
        $this->computacion = $computacion;

        return $this;
    }

    public function getComputacionNivel(): ?string
    {
        return $this->computacionNivel;
    }

    public function setComputacionNivel(?string $computacionNivel): self
    {
        $this->computacionNivel = $computacionNivel;

        return $this;
    }

    public function getInstruccion(): ?string
    {
        return $this->instruccion;
    }

    public function setInstruccion(?string $instruccion): self
    {
        $this->instruccion = $instruccion;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getTitulo2(): ?string
    {
        return $this->titulo2;
    }

    public function setTitulo2(?string $titulo2): self
    {
        $this->titulo2 = $titulo2;

        return $this;
    }

    public function getTitulo3(): ?string
    {
        return $this->titulo3;
    }

    public function setTitulo3(?string $titulo3): self
    {
        $this->titulo3 = $titulo3;

        return $this;
    }

    public function getTitulo4(): ?string
    {
        return $this->titulo4;
    }

    public function setTitulo4(?string $titulo4): self
    {
        $this->titulo4 = $titulo4;

        return $this;
    }

    public function getTitulo5(): ?string
    {
        return $this->titulo5;
    }

    public function setTitulo5(?string $titulo5): self
    {
        $this->titulo5 = $titulo5;

        return $this;
    }

    public function getTitulo6(): ?string
    {
        return $this->titulo6;
    }

    public function setTitulo6(?string $titulo6): self
    {
        $this->titulo6 = $titulo6;

        return $this;
    }

    public function getCiudad1(): ?string
    {
        return $this->ciudad1;
    }

    public function setCiudad1(?string $ciudad1): self
    {
        $this->ciudad1 = $ciudad1;

        return $this;
    }

    public function getCiudad2(): ?string
    {
        return $this->ciudad2;
    }

    public function setCiudad2(?string $ciudad2): self
    {
        $this->ciudad2 = $ciudad2;

        return $this;
    }

    public function getCiudad3(): ?string
    {
        return $this->ciudad3;
    }

    public function setCiudad3(?string $ciudad3): self
    {
        $this->ciudad3 = $ciudad3;

        return $this;
    }

    public function getCiudad4(): ?string
    {
        return $this->ciudad4;
    }

    public function setCiudad4(?string $ciudad4): self
    {
        $this->ciudad4 = $ciudad4;

        return $this;
    }

    public function getCiudadotros(): ?string
    {
        return $this->ciudadotros;
    }

    public function setCiudadotros(?string $ciudadotros): self
    {
        $this->ciudadotros = $ciudadotros;

        return $this;
    }

    public function getCursomi(): ?string
    {
        return $this->cursomi;
    }

    public function setCursomi(?string $cursomi): self
    {
        $this->cursomi = $cursomi;

        return $this;
    }

    public function getLicencia(): ?string
    {
        return $this->licencia;
    }

    public function setLicencia(?string $licencia): self
    {
        $this->licencia = $licencia;

        return $this;
    }

    public function getLicenciaFechaexp(): ?\DateTimeInterface
    {
        return $this->licenciaFechaexp;
    }

    public function setLicenciaFechaexp(?\DateTimeInterface $licenciaFechaexp): self
    {
        $this->licenciaFechaexp = $licenciaFechaexp;

        return $this;
    }

    public function getIdCargo(): ?int
    {
        return $this->idCargo;
    }

    public function setIdCargo(?int $idCargo): self
    {
        $this->idCargo = $idCargo;

        return $this;
    }

    public function getIdSueldo(): ?int
    {
        return $this->idSueldo;
    }

    public function setIdSueldo(?int $idSueldo): self
    {
        $this->idSueldo = $idSueldo;

        return $this;
    }

    public function getSueldo(): ?float
    {
        return $this->sueldo;
    }

    public function setSueldo(?float $sueldo): self
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    public function getBonificacion(): ?float
    {
        return $this->bonificacion;
    }

    public function setBonificacion(?float $bonificacion): self
    {
        $this->bonificacion = $bonificacion;

        return $this;
    }

    public function getIdBonificacion(): ?int
    {
        return $this->idBonificacion;
    }

    public function setIdBonificacion(?int $idBonificacion): self
    {
        $this->idBonificacion = $idBonificacion;

        return $this;
    }

    public function getMovilizacion(): ?float
    {
        return $this->movilizacion;
    }

    public function setMovilizacion(?float $movilizacion): self
    {
        $this->movilizacion = $movilizacion;

        return $this;
    }

    public function getIdMovilizacion(): ?int
    {
        return $this->idMovilizacion;
    }

    public function setIdMovilizacion(?int $idMovilizacion): self
    {
        $this->idMovilizacion = $idMovilizacion;

        return $this;
    }

    public function getCargas(): ?int
    {
        return $this->cargas;
    }

    public function setCargas(?int $cargas): self
    {
        $this->cargas = $cargas;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getIdCliente(): ?int
    {
        return $this->idCliente;
    }

    public function setIdCliente(?int $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getIdLugar(): ?int
    {
        return $this->idLugar;
    }

    public function setIdLugar(?int $idLugar): self
    {
        $this->idLugar = $idLugar;

        return $this;
    }

    public function getOrdenLugart(): ?int
    {
        return $this->ordenLugart;
    }

    public function setOrdenLugart(int $ordenLugart): self
    {
        $this->ordenLugart = $ordenLugart;

        return $this;
    }

    public function getCiudadt(): ?string
    {
        return $this->ciudadt;
    }

    public function setCiudadt(?string $ciudadt): self
    {
        $this->ciudadt = $ciudadt;

        return $this;
    }

    public function getOrdenCiudadt(): ?int
    {
        return $this->ordenCiudadt;
    }

    public function setOrdenCiudadt(int $ordenCiudadt): self
    {
        $this->ordenCiudadt = $ordenCiudadt;

        return $this;
    }

    public function getJornada(): ?string
    {
        return $this->jornada;
    }

    public function setJornada(?string $jornada): self
    {
        $this->jornada = $jornada;

        return $this;
    }

    public function getPerVacaciones1(): ?\DateTimeInterface
    {
        return $this->perVacaciones1;
    }

    public function setPerVacaciones1(?\DateTimeInterface $perVacaciones1): self
    {
        $this->perVacaciones1 = $perVacaciones1;

        return $this;
    }

    public function getPerVacaciones2(): ?\DateTimeInterface
    {
        return $this->perVacaciones2;
    }

    public function setPerVacaciones2(?\DateTimeInterface $perVacaciones2): self
    {
        $this->perVacaciones2 = $perVacaciones2;

        return $this;
    }

    public function getVacaciones(): ?string
    {
        return $this->vacaciones;
    }

    public function setVacaciones(?string $vacaciones): self
    {
        $this->vacaciones = $vacaciones;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNombrePadre(): ?string
    {
        return $this->nombrePadre;
    }

    public function setNombrePadre(?string $nombrePadre): self
    {
        $this->nombrePadre = $nombrePadre;

        return $this;
    }

    public function getNombreMadre(): ?string
    {
        return $this->nombreMadre;
    }

    public function setNombreMadre(?string $nombreMadre): self
    {
        $this->nombreMadre = $nombreMadre;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getItem(): ?string
    {
        return $this->item;
    }

    public function setItem(?string $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getContrato(): ?string
    {
        return $this->contrato;
    }

    public function setContrato(?string $contrato): self
    {
        $this->contrato = $contrato;

        return $this;
    }

    public function getEnrol(): ?string
    {
        return $this->enrol;
    }

    public function setEnrol(?string $enrol): self
    {
        $this->enrol = $enrol;

        return $this;
    }

    public function getEnanticipo(): ?string
    {
        return $this->enanticipo;
    }

    public function setEnanticipo(?string $enanticipo): self
    {
        $this->enanticipo = $enanticipo;

        return $this;
    }

    public function getRetsueldo(): ?string
    {
        return $this->retsueldo;
    }

    public function setRetsueldo(?string $retsueldo): self
    {
        $this->retsueldo = $retsueldo;

        return $this;
    }

    public function getGastosDeducibles(): ?float
    {
        return $this->gastosDeducibles;
    }

    public function setGastosDeducibles(?float $gastosDeducibles): self
    {
        $this->gastosDeducibles = $gastosDeducibles;

        return $this;
    }

    public function getFondosReserva(): ?string
    {
        return $this->fondosReserva;
    }

    public function setFondosReserva(?string $fondosReserva): self
    {
        $this->fondosReserva = $fondosReserva;

        return $this;
    }

    public function getTallab(): ?string
    {
        return $this->tallab;
    }

    public function setTallab(?string $tallab): self
    {
        $this->tallab = $tallab;

        return $this;
    }

    public function getTallau(): ?string
    {
        return $this->tallau;
    }

    public function setTallau(?string $tallau): self
    {
        $this->tallau = $tallau;

        return $this;
    }

    public function getHe(): ?int
    {
        return $this->he;
    }

    public function setHe(?int $he): self
    {
        $this->he = $he;

        return $this;
    }

    public function getMultas(): ?int
    {
        return $this->multas;
    }

    public function setMultas(?int $multas): self
    {
        $this->multas = $multas;

        return $this;
    }

    public function getFaltas(): ?int
    {
        return $this->faltas;
    }

    public function setFaltas(?int $faltas): self
    {
        $this->faltas = $faltas;

        return $this;
    }

    public function getThe(): ?int
    {
        return $this->the;
    }

    public function setThe(?int $the): self
    {
        $this->the = $the;

        return $this;
    }

    public function getTmultas(): ?int
    {
        return $this->tmultas;
    }

    public function setTmultas(?int $tmultas): self
    {
        $this->tmultas = $tmultas;

        return $this;
    }

    public function getTfaltas(): ?int
    {
        return $this->tfaltas;
    }

    public function setTfaltas(?int $tfaltas): self
    {
        $this->tfaltas = $tfaltas;

        return $this;
    }

    public function getTipoCosto(): ?string
    {
        return $this->tipoCosto;
    }

    public function setTipoCosto(?string $tipoCosto): self
    {
        $this->tipoCosto = $tipoCosto;

        return $this;
    }

    public function getReferencias(): ?string
    {
        return $this->referencias;
    }

    public function setReferencias(?string $referencias): self
    {
        $this->referencias = $referencias;

        return $this;
    }

    public function getA�os(): ?int
    {
        return $this->a�os;
    }

    public function setA�os(?int $a�os): self
    {
        $this->a�os = $a�os;

        return $this;
    }

    public function getMeses(): ?int
    {
        return $this->meses;
    }

    public function setMeses(?int $meses): self
    {
        $this->meses = $meses;

        return $this;
    }

    public function getDias(): ?int
    {
        return $this->dias;
    }

    public function setDias(?int $dias): self
    {
        $this->dias = $dias;

        return $this;
    }

    public function getTotalDias(): ?int
    {
        return $this->totalDias;
    }

    public function setTotalDias(?int $totalDias): self
    {
        $this->totalDias = $totalDias;

        return $this;
    }

    public function getCarga(): ?string
    {
        return $this->carga;
    }

    public function setCarga(?string $carga): self
    {
        $this->carga = $carga;

        return $this;
    }

    public function getIdGye(): ?int
    {
        return $this->idGye;
    }

    public function setIdGye(?int $idGye): self
    {
        $this->idGye = $idGye;

        return $this;
    }

    public function getFecUpdate(): ?\DateTimeInterface
    {
        return $this->fecUpdate;
    }

    public function setFecUpdate(?\DateTimeInterface $fecUpdate): self
    {
        $this->fecUpdate = $fecUpdate;

        return $this;
    }

    public function getFecTraspaso(): ?\DateTimeInterface
    {
        return $this->fecTraspaso;
    }

    public function setFecTraspaso(?\DateTimeInterface $fecTraspaso): self
    {
        $this->fecTraspaso = $fecTraspaso;

        return $this;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getIdPersonal2(): ?int
    {
        return $this->idPersonal2;
    }

    public function setIdPersonal2(?int $idPersonal2): self
    {
        $this->idPersonal2 = $idPersonal2;

        return $this;
    }

    public function getIdPuesto(): ?int
    {
        return $this->idPuesto;
    }

    public function setIdPuesto(?int $idPuesto): self
    {
        $this->idPuesto = $idPuesto;

        return $this;
    }

    public function getFirma(): ?string
    {
        return $this->firma;
    }

    public function setFirma(?string $firma): self
    {
        $this->firma = $firma;

        return $this;
    }

    public function getPasar(): ?string
    {
        return $this->pasar;
    }

    public function setPasar(?string $pasar): self
    {
        $this->pasar = $pasar;

        return $this;
    }

    public function getLogIng(): ?string
    {
        return $this->logIng;
    }

    public function setLogIng(?string $logIng): self
    {
        $this->logIng = $logIng;

        return $this;
    }

    public function getFechai(): ?\DateTimeInterface
    {
        return $this->fechai;
    }

    public function setFechai(?\DateTimeInterface $fechai): self
    {
        $this->fechai = $fechai;

        return $this;
    }

    public function getLogUpd(): ?string
    {
        return $this->logUpd;
    }

    public function setLogUpd(?string $logUpd): self
    {
        $this->logUpd = $logUpd;

        return $this;
    }

    public function getFechaupd(): ?\DateTimeInterface
    {
        return $this->fechaupd;
    }

    public function setFechaupd(?\DateTimeInterface $fechaupd): self
    {
        $this->fechaupd = $fechaupd;

        return $this;
    }

    public function getRef1(): ?string
    {
        return $this->ref1;
    }

    public function setRef1(?string $ref1): self
    {
        $this->ref1 = $ref1;

        return $this;
    }

    public function getRef2(): ?string
    {
        return $this->ref2;
    }

    public function setRef2(?string $ref2): self
    {
        $this->ref2 = $ref2;

        return $this;
    }

    public function getRef3(): ?string
    {
        return $this->ref3;
    }

    public function setRef3(?string $ref3): self
    {
        $this->ref3 = $ref3;

        return $this;
    }

    public function getOcup1(): ?string
    {
        return $this->ocup1;
    }

    public function setOcup1(?string $ocup1): self
    {
        $this->ocup1 = $ocup1;

        return $this;
    }

    public function getOcup2(): ?string
    {
        return $this->ocup2;
    }

    public function setOcup2(?string $ocup2): self
    {
        $this->ocup2 = $ocup2;

        return $this;
    }

    public function getOcup3(): ?string
    {
        return $this->ocup3;
    }

    public function setOcup3(?string $ocup3): self
    {
        $this->ocup3 = $ocup3;

        return $this;
    }

    public function getTelrl1(): ?string
    {
        return $this->telrl1;
    }

    public function setTelrl1(?string $telrl1): self
    {
        $this->telrl1 = $telrl1;

        return $this;
    }

    public function getTelrl2(): ?string
    {
        return $this->telrl2;
    }

    public function setTelrl2(?string $telrl2): self
    {
        $this->telrl2 = $telrl2;

        return $this;
    }

    public function getTelrl3(): ?string
    {
        return $this->telrl3;
    }

    public function setTelrl3(?string $telrl3): self
    {
        $this->telrl3 = $telrl3;

        return $this;
    }

    public function getTiemporl1(): ?string
    {
        return $this->tiemporl1;
    }

    public function setTiemporl1(?string $tiemporl1): self
    {
        $this->tiemporl1 = $tiemporl1;

        return $this;
    }

    public function getTiemporl2(): ?string
    {
        return $this->tiemporl2;
    }

    public function setTiemporl2(?string $tiemporl2): self
    {
        $this->tiemporl2 = $tiemporl2;

        return $this;
    }

    public function getTiemporl3(): ?string
    {
        return $this->tiemporl3;
    }

    public function setTiemporl3(?string $tiemporl3): self
    {
        $this->tiemporl3 = $tiemporl3;

        return $this;
    }

    public function getRefp1(): ?string
    {
        return $this->refp1;
    }

    public function setRefp1(?string $refp1): self
    {
        $this->refp1 = $refp1;

        return $this;
    }

    public function getRefp2(): ?string
    {
        return $this->refp2;
    }

    public function setRefp2(?string $refp2): self
    {
        $this->refp2 = $refp2;

        return $this;
    }

    public function getOcupp1(): ?string
    {
        return $this->ocupp1;
    }

    public function setOcupp1(?string $ocupp1): self
    {
        $this->ocupp1 = $ocupp1;

        return $this;
    }

    public function getOcupp2(): ?string
    {
        return $this->ocupp2;
    }

    public function setOcupp2(?string $ocupp2): self
    {
        $this->ocupp2 = $ocupp2;

        return $this;
    }

    public function getTelrp1(): ?string
    {
        return $this->telrp1;
    }

    public function setTelrp1(?string $telrp1): self
    {
        $this->telrp1 = $telrp1;

        return $this;
    }

    public function getTelrp2(): ?string
    {
        return $this->telrp2;
    }

    public function setTelrp2(?string $telrp2): self
    {
        $this->telrp2 = $telrp2;

        return $this;
    }

    public function getTiemporp1(): ?string
    {
        return $this->tiemporp1;
    }

    public function setTiemporp1(?string $tiemporp1): self
    {
        $this->tiemporp1 = $tiemporp1;

        return $this;
    }

    public function getTiemporp2(): ?string
    {
        return $this->tiemporp2;
    }

    public function setTiemporp2(?string $tiemporp2): self
    {
        $this->tiemporp2 = $tiemporp2;

        return $this;
    }

    public function getEme1(): ?string
    {
        return $this->eme1;
    }

    public function setEme1(?string $eme1): self
    {
        $this->eme1 = $eme1;

        return $this;
    }

    public function getEme2(): ?string
    {
        return $this->eme2;
    }

    public function setEme2(?string $eme2): self
    {
        $this->eme2 = $eme2;

        return $this;
    }

    public function getPare1(): ?string
    {
        return $this->pare1;
    }

    public function setPare1(?string $pare1): self
    {
        $this->pare1 = $pare1;

        return $this;
    }

    public function getPare2(): ?string
    {
        return $this->pare2;
    }

    public function setPare2(?string $pare2): self
    {
        $this->pare2 = $pare2;

        return $this;
    }

    public function getTele1(): ?string
    {
        return $this->tele1;
    }

    public function setTele1(?string $tele1): self
    {
        $this->tele1 = $tele1;

        return $this;
    }

    public function getTele2(): ?string
    {
        return $this->tele2;
    }

    public function setTele2(?string $tele2): self
    {
        $this->tele2 = $tele2;

        return $this;
    }

    public function getDire1(): ?string
    {
        return $this->dire1;
    }

    public function setDire1(?string $dire1): self
    {
        $this->dire1 = $dire1;

        return $this;
    }

    public function getDire2(): ?string
    {
        return $this->dire2;
    }

    public function setDire2(?string $dire2): self
    {
        $this->dire2 = $dire2;

        return $this;
    }

    public function getDocEscaneado(): ?string
    {
        return $this->docEscaneado;
    }

    public function setDocEscaneado(?string $docEscaneado): self
    {
        $this->docEscaneado = $docEscaneado;

        return $this;
    }

    public function getMotivoSalida(): ?string
    {
        return $this->motivoSalida;
    }

    public function setMotivoSalida(?string $motivoSalida): self
    {
        $this->motivoSalida = $motivoSalida;

        return $this;
    }

    public function getEstatura(): ?string
    {
        return $this->estatura;
    }

    public function setEstatura(?string $estatura): self
    {
        $this->estatura = $estatura;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(?string $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(?string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getCarnetDiscap(): ?string
    {
        return $this->carnetDiscap;
    }

    public function setCarnetDiscap(?string $carnetDiscap): self
    {
        $this->carnetDiscap = $carnetDiscap;

        return $this;
    }

    public function getTipoDiscap(): ?string
    {
        return $this->tipoDiscap;
    }

    public function setTipoDiscap(?string $tipoDiscap): self
    {
        $this->tipoDiscap = $tipoDiscap;

        return $this;
    }

    public function getPorcentaje(): ?string
    {
        return $this->porcentaje;
    }

    public function setPorcentaje(?string $porcentaje): self
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    public function getNumReg(): ?string
    {
        return $this->numReg;
    }

    public function setNumReg(?string $numReg): self
    {
        $this->numReg = $numReg;

        return $this;
    }

    public function getFechaExpiracion(): ?\DateTimeInterface
    {
        return $this->fechaExpiracion;
    }

    public function setFechaExpiracion(?\DateTimeInterface $fechaExpiracion): self
    {
        $this->fechaExpiracion = $fechaExpiracion;

        return $this;
    }

    public function getCodigoDactilar(): ?string
    {
        return $this->codigoDactilar;
    }

    public function setCodigoDactilar(?string $codigoDactilar): self
    {
        $this->codigoDactilar = $codigoDactilar;

        return $this;
    }

    public function getFechaact(): ?\DateTimeInterface
    {
        return $this->fechaact;
    }

    public function setFechaact(?\DateTimeInterface $fechaact): self
    {
        $this->fechaact = $fechaact;

        return $this;
    }

    public function getDias1(): ?int
    {
        return $this->dias1;
    }

    public function setDias1(?int $dias1): self
    {
        $this->dias1 = $dias1;

        return $this;
    }

    public function getDias2(): ?int
    {
        return $this->dias2;
    }

    public function setDias2(?int $dias2): self
    {
        $this->dias2 = $dias2;

        return $this;
    }

    public function getDias3(): ?int
    {
        return $this->dias3;
    }

    public function setDias3(?int $dias3): self
    {
        $this->dias3 = $dias3;

        return $this;
    }

    public function getDias4(): ?int
    {
        return $this->dias4;
    }

    public function setDias4(?int $dias4): self
    {
        $this->dias4 = $dias4;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(?int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getOrden2(): ?int
    {
        return $this->orden2;
    }

    public function setOrden2(?int $orden2): self
    {
        $this->orden2 = $orden2;

        return $this;
    }

    public function getOrden3(): ?int
    {
        return $this->orden3;
    }

    public function setOrden3(?int $orden3): self
    {
        $this->orden3 = $orden3;

        return $this;
    }

    public function getRestringir(): ?int
    {
        return $this->restringir;
    }

    public function setRestringir(?int $restringir): self
    {
        $this->restringir = $restringir;

        return $this;
    }

    public function getPeriodoActivo(): ?string
    {
        return $this->periodoActivo;
    }

    public function setPeriodoActivo(string $periodoActivo): self
    {
        $this->periodoActivo = $periodoActivo;

        return $this;
    }

    /**
     * @return Collection|PuestoTrabajo[]
     */
    public function getPuestos(): Collection
    {
        return $this->puestos;
    }

    public function addPuesto(PuestoTrabajo $puesto): self
    {
        if (!$this->puestos->contains($puesto)) {
            $this->puestos[] = $puesto;
            $puesto->addPersonal($this);
        }

        return $this;
    }

    public function removePuesto(PuestoTrabajo $puesto): self
    {
        if ($this->puestos->removeElement($puesto)) {
            $puesto->removePersonal($this);
        }

        return $this;
    }


}
