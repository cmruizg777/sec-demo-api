<?php

namespace App\Entity;

use App\Repository\DiaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiaRepository::class)
 */
class Dia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $codigo;

    /**
     * @ORM\ManyToMany(targetEntity=Asignacion::class, mappedBy="dias")
     */
    private $asignaciones;



    public function __construct()
    {
        $this->libres = new ArrayCollection();
        $this->asignaciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * @return Collection|Libre[]
     */
    public function getLibres(): Collection
    {
        return $this->libres;
    }

    public function addLibre(Libre $libre): self
    {
        if (!$this->libres->contains($libre)) {
            $this->libres[] = $libre;
            $libre->setDia($this);
        }

        return $this;
    }

    public function removeLibre(Libre $libre): self
    {
        if ($this->libres->removeElement($libre)) {
            // set the owning side to null (unless already changed)
            if ($libre->getDia() === $this) {
                $libre->setDia(null);
            }
        }

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
            $asignacione->addDia($this);
        }

        return $this;
    }

    public function removeAsignacione(Asignacion $asignacione): self
    {
        if ($this->asignaciones->removeElement($asignacione)) {
            $asignacione->removeDia($this);
        }

        return $this;
    }
}
