<?php

namespace App\Entity;

use App\Repository\TipoReporteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoReporteRepository::class)
 */
class TipoReporte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1, unique=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Reporte::class, mappedBy="tipo")
     */
    private $reportes;

    public function __construct()
    {
        $this->reportes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Reporte[]
     */
    public function getReportes(): Collection
    {
        return $this->reportes;
    }

    public function addReporte(Reporte $reporte): self
    {
        if (!$this->reportes->contains($reporte)) {
            $this->reportes[] = $reporte;
            $reporte->setTipo($this);
        }

        return $this;
    }

    public function removeReporte(Reporte $reporte): self
    {
        if ($this->reportes->removeElement($reporte)) {
            // set the owning side to null (unless already changed)
            if ($reporte->getTipo() === $this) {
                $reporte->setTipo(null);
            }
        }

        return $this;
    }
}
