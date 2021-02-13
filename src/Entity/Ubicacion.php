<?php

namespace App\Entity;

use App\Repository\UbicacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UbicacionRepository::class)
 */
class Ubicacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $latitud;

    /**
     * @ORM\Column(type="float")
     */
    private $longitud;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $velocidad;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $precisiongps;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitud(): ?float
    {
        return $this->latitud;
    }

    public function setLatitud(float $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?float
    {
        return $this->longitud;
    }

    public function setLongitud(float $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getVelocidad(): ?float
    {
        return $this->velocidad;
    }

    public function setVelocidad(?float $velocidad): self
    {
        $this->velocidad = $velocidad;

        return $this;
    }

    public function getPrecisiongps(): ?float
    {
        return $this->precisiongps;
    }

    public function setPrecisiongps(?float $precisiongps): self
    {
        $this->precisiongps = $precisiongps;

        return $this;
    }
}
