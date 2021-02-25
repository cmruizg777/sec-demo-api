<?php

namespace App\Entity;

use App\Repository\ReporteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReporteRepository::class)
 */
class Reporte
{
    public const ENTRADA        = 'E';
    public const SALIDA         = 'S';
    public const NOVEDAD        = 'N';
    public const CONSIGNA       = 'C';
    public const RECOMENDACION  = 'R';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=TipoReporte::class, inversedBy="reportes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity=Foto::class, mappedBy="reporte")
     */
    private $fotos;

    /**
     * @ORM\OneToOne(targetEntity=Ubicacion::class, cascade={"persist", "remove"})
     */
    private $ubicacion;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="reportes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=PuestoTrabajo::class, inversedBy="reportes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $puesto;

    /**
     * @ORM\Column(type="time")
     */
    private $hora;

    public function __construct()
    {
        $this->fotos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getTipo(): ?TipoReporte
    {
        return $this->tipo;
    }

    public function setTipo(?TipoReporte $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return Collection|Foto[]
     */
    public function getFotos(): Collection
    {
        return $this->fotos;
    }

    public function addFoto(Foto $foto): self
    {
        if (!$this->fotos->contains($foto)) {
            $this->fotos[] = $foto;
            $foto->setReporte($this);
        }

        return $this;
    }

    public function removeFoto(Foto $foto): self
    {
        if ($this->fotos->removeElement($foto)) {
            // set the owning side to null (unless already changed)
            if ($foto->getReporte() === $this) {
                $foto->setReporte(null);
            }
        }

        return $this;
    }

    public function getUbicacion(): ?Ubicacion
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?Ubicacion $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getPuesto(): ?PuestoTrabajo
    {
        return $this->puesto;
    }

    public function setPuesto(?PuestoTrabajo $puesto): self
    {
        $this->puesto = $puesto;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

}
