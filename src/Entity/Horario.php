<?php

namespace App\Entity;

use App\Repository\HorarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HorarioRepository::class)
 */
class Horario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $entrada;

    /**
     * @ORM\Column(type="time")
     */
    private $salida;

    /**
     * @ORM\OneToMany(targetEntity=Asignacion::class, mappedBy="horario")
     */
    private $asignaciones;

    public function __construct()
    {
        $this->asignaciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrada(): ?\DateTimeInterface
    {
        return $this->entrada;
    }

    public function setEntrada(\DateTimeInterface $entrada): self
    {
        $this->entrada = $entrada;

        return $this;
    }

    public function getSalida(): ?\DateTimeInterface
    {
        return $this->salida;
    }

    public function setSalida(\DateTimeInterface $salida): self
    {
        $this->salida = $salida;

        return $this;
    }

    /**
     * @return Collection|Asignacion[]
     */
    public function getAsignaciones(): Collection
    {
        return $this->asignaciones;
    }

    public function addAsignacione(Asignacion $asignacione): self
    {
        if (!$this->asignaciones->contains($asignacione)) {
            $this->asignaciones[] = $asignacione;
            $asignacione->setHorario($this);
        }

        return $this;
    }

    public function removeAsignacione(Asignacion $asignacione): self
    {
        if ($this->asignaciones->removeElement($asignacione)) {
            // set the owning side to null (unless already changed)
            if ($asignacione->getHorario() === $this) {
                $asignacione->setHorario(null);
            }
        }

        return $this;
    }
}
