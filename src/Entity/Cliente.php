<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=PuestoTrabajo::class, mappedBy="cliente")
     */
    private $puestos;

    public function __construct()
    {
        $this->puestos = new ArrayCollection();
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
            $puesto->setCliente($this);
        }

        return $this;
    }

    public function removePuesto(PuestoTrabajo $puesto): self
    {
        if ($this->puestos->removeElement($puesto)) {
            // set the owning side to null (unless already changed)
            if ($puesto->getCliente() === $this) {
                $puesto->setCliente(null);
            }
        }

        return $this;
    }
}
