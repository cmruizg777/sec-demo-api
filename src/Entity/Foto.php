<?php

namespace App\Entity;

use App\Repository\FotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FotoRepository::class)
 */
class Foto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="blob")
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $extension;

    /**
     * @ORM\ManyToOne(targetEntity=Reporte::class, inversedBy="fotos")
     */
    private $reporte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getReporte(): ?Reporte
    {
        return $this->reporte;
    }

    public function setReporte(?Reporte $reporte): self
    {
        $this->reporte = $reporte;

        return $this;
    }
}
