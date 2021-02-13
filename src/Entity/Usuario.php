<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * User
 *
 * @ORM\Table(name="usuario");
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository");
 * @ORM\HasLifecycleCallbacks()
 */

class Usuario implements UserInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    protected $username;

    protected $salt;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     * @Serializer\Exclude()
     */
    protected $password;

    /**
     * @var string
     */
    protected $plainPassword;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    protected $roles = [];

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Personal::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="personal", referencedColumnName="id_personal")
     */
    private $perfil;

    /**
     * @ORM\OneToMany(targetEntity=Reporte::class, mappedBy="usuario")
     */
    private $reportes;

    /**
     * @ORM\ManyToMany(targetEntity=PuestoTrabajo::class, mappedBy="usuario")
     */
    private $puestos;


    public function __construct()
    {
        $this->reportes = new ArrayCollection();
        $this->puestos = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        $this->password = null;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function getSalt() {}

    public function eraseCredentials() {}

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $dateTimeNow = new DateTime('now');
        $this->setUpdatedAt($dateTimeNow);
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }

    public function getPerfil(): ?Personal
    {
        return $this->perfil;
    }

    public function setPerfil(?Personal $perfil): self
    {
        $this->perfil = $perfil;

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
            $reporte->setUsuario($this);
        }

        return $this;
    }

    public function removeReporte(Reporte $reporte): self
    {
        if ($this->reportes->removeElement($reporte)) {
            // set the owning side to null (unless already changed)
            if ($reporte->getUsuario() === $this) {
                $reporte->setUsuario(null);
            }
        }

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
            $puesto->addUsuario($this);
        }

        return $this;
    }

    public function removePuesto(PuestoTrabajo $puesto): self
    {
        if ($this->puestos->removeElement($puesto)) {
            $puesto->removeUsuario($this);
        }

        return $this;
    }

}
