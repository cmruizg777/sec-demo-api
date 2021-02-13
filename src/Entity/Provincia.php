<?php

namespace App\Entity;

use App\Repository\ProvinciaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProvinciaRepository::class)
 */
class Provincia
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
     * @ORM\ManyToOne(targetEntity=Zona::class, inversedBy="provincias")
     */
    private $zona;

    /**
     * @ORM\OneToMany(targetEntity=PuestoTrabajo::class, mappedBy="provincia")
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

    public function getZona(): ?Zona
    {
        return $this->zona;
    }

    public function setZona(?Zona $zona): self
    {
        $this->zona = $zona;

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
            $puesto->setProvincia($this);
        }

        return $this;
    }

    public function removePuesto(PuestoTrabajo $puesto): self
    {
        if ($this->puestos->removeElement($puesto)) {
            // set the owning side to null (unless already changed)
            if ($puesto->getProvincia() === $this) {
                $puesto->setProvincia(null);
            }
        }

        return $this;
    }
}
