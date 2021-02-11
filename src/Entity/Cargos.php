<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargos
 *
 * @ORM\Table(name="cargos")
 * @ORM\Entity
 */
class Cargos
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CARGO", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCargo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_CARGO", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $nomCargo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TextoParaROL", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $textopararol = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="OBSERVACIONES", type="string", length=400, nullable=true, options={"default"="NULL"})
     */
    private $observaciones = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $fecha = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ESTADO", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_ORDER", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idOrder = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="usu_ing", type="string", length=30, nullable=false)
     */
    private $usuIng;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_ing", type="date", nullable=false)
     */
    private $fecIng;

    public function getIdCargo(): ?string
    {
        return $this->idCargo;
    }

    public function getNomCargo(): ?string
    {
        return $this->nomCargo;
    }

    public function setNomCargo(?string $nomCargo): self
    {
        $this->nomCargo = $nomCargo;

        return $this;
    }

    public function getTextopararol(): ?string
    {
        return $this->textopararol;
    }

    public function setTextopararol(?string $textopararol): self
    {
        $this->textopararol = $textopararol;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(?int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }

    public function getUsuIng(): ?string
    {
        return $this->usuIng;
    }

    public function setUsuIng(string $usuIng): self
    {
        $this->usuIng = $usuIng;

        return $this;
    }

    public function getFecIng(): ?\DateTimeInterface
    {
        return $this->fecIng;
    }

    public function setFecIng(\DateTimeInterface $fecIng): self
    {
        $this->fecIng = $fecIng;

        return $this;
    }


}
