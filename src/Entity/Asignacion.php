<?php

namespace App\Entity;

use App\Repository\AsignacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AsignacionRepository::class)
 */
class Asignacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $inicio;

    /**
     * @ORM\Column(type="date")
     */
    private $fin;

    /**
     * @ORM\ManyToMany(targetEntity=Dia::class, inversedBy="asignaciones")
     */
    private $dias;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="asignaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Horario::class, inversedBy="asignaciones")
     */
    private $horario;

    /**
     * @ORM\ManyToOne(targetEntity=PuestoTrabajo::class, inversedBy="asignaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $puesto;

    public function __construct()
    {
        $this->dias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInicio(): ?\DateTimeInterface
    {
        return $this->inicio;
    }

    public function setInicio(\DateTimeInterface $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * @return Collection|Dia[]
     */
    public function getDias(): Collection
    {
        return $this->dias;
    }

    public function addDia(Dia $dia): self
    {
        if (!$this->dias->contains($dia)) {
            $this->dias[] = $dia;
        }

        return $this;
    }

    public function removeDia(Dia $dia): self
    {
        $this->dias->removeElement($dia);

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

    public function getHorario(): ?Horario
    {
        return $this->horario;
    }

    public function setHorario(?Horario $horario): self
    {
        $this->horario = $horario;

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
}
