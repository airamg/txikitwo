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
     * @ORM\Column(type="string")
     */
    private $rutaFoto;

    /**
     * @Assert\Image(maxSize = "900k")
     */
    private $foto;

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
     * @ORM\Column(name="codigoPostal", type="string", length=5)
     * @Assert\NotBlank(message = "Es necesario introducir un valor.")
     * @Assert\Length(min = 5)
     */
    private $codigoPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="comprasRealizadas", type="string", length=5)
     */
    private $comprasRealizadas;

    /**
     * @var string
     *
     * @ORM\Column(name="comprasPendientes", type="string", length=2)
     */
    private $comprasPendientes;


    public function __construct()
    {
        $this->setRole("user");
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
     * Set rutaFoto
     *
     * @param string $rutaFoto
     * @return Articulo
     */
    public function setRutaFoto($rutaFoto)
    {
        $this->rutaFoto = $rutaFoto;

        return $this;
    }

    /**
     * Get rutaFoto
     *
     * @return string
     */
    public function getRutaFoto()
    {
        return $this->rutaFoto;
    }

    /**
     * Set foto.
     *
     * @param UploadedFile $foto
     */
    public function setFoto(UploadedFile $foto = null)
    {
        $this->foto = $foto;
    }

    /**
     * Get foto.
     *
     * @return UploadedFile
     */
    public function getFoto()
    {
        return $this->foto;
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
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return Usuario
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set comprasRealizadas
     *
     * @param string $comprasRealizadas
     * @return Usuario
     */
    public function setComprasRealizadas($comprasRealizadas)
    {
        $this->comprasRealizadas = $comprasRealizadas;

        return $this;
    }

    /**
     * Get comprasRealizadas
     *
     * @return string
     */
    public function getComprasRealizadas()
    {
        return $this->comprasRealizadas;
    }

    /**
     * Set comprasPendientes
     *
     * @param string $comprasPendientes
     * @return Usuario
     */
    public function setComprasPendientes($comprasPendientes)
    {
        $this->comprasPendientes = $comprasPendientes;

        return $this;
    }

    /**
     * Get comprasPendientes
     *
     * @return string
     */
    public function getComprasPendientes()
    {
        return $this->comprasPendientes;
    }

}