<?php

namespace App\Entity;

use App\Repository\TurnoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TurnoRepository::class)
 */
class Turno
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=Horario::class, inversedBy="turnos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Horario;

    /**
     * @ORM\ManyToOne(targetEntity=Aspirante::class, inversedBy="turnos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aspirante;

    /**
     * @ORM\ManyToOne(targetEntity=FormaPago::class, inversedBy="turnos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fPago;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHorario(): ?Horario
    {
        return $this->Horario;
    }

    public function setHorario(?Horario $Horario): self
    {
        $this->Horario = $Horario;

        return $this;
    }

    public function getAspirante(): ?Aspirante
    {
        return $this->aspirante;
    }

    public function setAspirante(?Aspirante $aspirante): self
    {
        $this->aspirante = $aspirante;

        return $this;
    }

    public function getFPago(): ?FormaPago
    {
        return $this->fPago;
    }

    public function setFPago(?FormaPago $fPago): self
    {
        $this->fPago = $fPago;

        return $this;
    }
}
