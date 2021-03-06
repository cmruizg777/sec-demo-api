<?php

namespace App\Entity;

use App\Repository\PuestoTrabajoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PuestoTrabajoRepository::class)
 */
class PuestoTrabajo
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
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="puestos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;
    /**
     * @ORM\OneToOne(targetEntity=Ubicacion::class, cascade={"persist", "remove"})
     */
    private $ubicacion;

    /**
     * @ORM\ManyToOne(targetEntity=Provincia::class, inversedBy="puestos")
     */
    private $provincia;

    /**
     * @ORM\OneToMany(targetEntity=Asignacion::class, mappedBy="puesto")
     */
    private $asignaciones;

    /**
     * @ORM\OneToMany(targetEntity=Reporte::class, mappedBy="puesto")
     */
    private $reportes;

    public function __construct()
    {

        $this->asignaciones = new ArrayCollection();
        $this->reportes = new ArrayCollection();
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

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

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

    public function getProvincia(): ?Provincia
    {
        return $this->provincia;
    }

    public function setProvincia(?Provincia $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * @return ArrayCollection|Asignacion[]
     */
    public function getAsignaciones(): Collection
    {
        return $this->asignaciones;
    }

    public function addAsignacione(Asignacion $asignacione): self
    {
        if (!$this->asignaciones->contains($asignacione)) {
            $this->asignaciones[] = $asignacione;
            $asignacione->setPuesto($this);
        }

        return $this;
    }

    public function removeAsignacione(Asignacion $asignacione): self
    {
        if ($this->asignaciones->removeElement($asignacione)) {
            // set the owning side to null (unless already changed)
            if ($asignacione->getPuesto() === $this) {
                $asignacione->setPuesto(null);
            }
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Reporte[]
     */
    public function getReportes(): Collection
    {
        return $this->reportes;
    }

    public function addReporte(Reporte $reporte): self
    {
        if (!$this->reportes->contains($reporte)) {
            $this->reportes[] = $reporte;
            $reporte->setPuesto($this);
        }

        return $this;
    }

    public function removeReporte(Reporte $reporte): self
    {
        if ($this->reportes->removeElement($reporte)) {
            // set the owning side to null (unless already changed)
            if ($reporte->getPuesto() === $this) {
                $reporte->setPuesto(null);
            }
        }

        return $this;
    }
}
