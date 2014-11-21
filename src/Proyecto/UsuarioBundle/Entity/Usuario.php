<?php

namespace Proyecto\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * Proyecto\UsuarioBundle\Entity\Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\UsuarioBundle\Entity\UsuarioRepository")
 * @DoctrineAssert\UniqueEntity("email")
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 6)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=5)
     */
    private $role;

    /**
     * @var string salt
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="text")
     * @Assert\NotBlank()
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_postal", type="string", length=5)
     * @Assert\NotBlank(message = "Es necesario introducir un valor.")
     * @Assert\Length(min = 5)
     */
    private $codigo_postal;

    /**
     * @var string
     *
     * @ORM\Column(name="compras_realizadas", type="string", length=5)
     */
    private $compras_realizadas;

    /**
     * @var string
     *
     * @ORM\Column(name="compras_pendientes", type="string", length=2)
     */
    private $compras_pendientes;

    /**
     * @var integer $compra
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\CompraBundle\Entity\Compra", inversedBy="usuarios")
     * @Assert\Type("Proyecto\CompraBundle\Entity\Compra")
     */
    private $compra;


    public function __construct()
    {
        /* hacer que role sea el de user */
    }

    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set codigo_postal
     *
     * @param string $codigo_postal
     * @return Usuario
     */
    public function setCodigo_postal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;

        return $this;
    }

    /**
     * Get codigo_postal
     *
     * @return string
     */
    public function getCodigo_postal()
    {
        return $this->codigo_postal;
    }

    /**
     * Set compras_realizadas
     *
     * @param string $compras_realizadas
     * @return Usuario
     */
    public function setCompras_realizadas($compras_realizadas)
    {
        $this->compras_realizadas = $compras_realizadas;

        return $this;
    }

    /**
     * Get compras_realizadas
     *
     * @return string
     */
    public function getCompras_realizadas()
    {
        return $this->compras_realizadas;
    }

    /**
     * Set compras_pendientes
     *
     * @param string $compras_pendientes
     * @return Usuario
     */
    public function setCompras_pendientes($compras_pendientes)
    {
        $this->compras_pendientes = $compras_pendientes;

        return $this;
    }

    /**
     * Get compras_pendientes
     *
     * @return string
     */
    public function getCompras_pendientes()
    {
        return $this->compras_pendientes;
    }

    /**
     * Set compra
     */
    public function setCompra(\Proyecto\CompraBundle\Entity\Compra $compra)
    {
        $this->compra = $compra;
    }

    /**
     * Get compra
     */
    public function getCompra()
    {
        return $this->compra;
    }
}
