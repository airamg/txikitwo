<?php

namespace Proyecto\CompraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * Proyecto\CompraBundle\Entity\Compra
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\CompraBundle\Entity\CompraRepository")
 */
class Compra
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     * @Assert\DateTime()
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $usuario;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(min = 0)
     */
    private $precio;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(min = 0)
     */
    private $precioTotal;

    /**
     * @var string numeroPedido
     *
     * @ORM\Column(name="numeroPedido", type="string", length=255)
     */
    private $numeroPedido;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $estado;

    /**
     * @var integer $personalizacion
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\PersonalizacionBundle\Entity\Personalizacion", inversedBy="compras")
     * @Assert\Type("Proyecto\PersonalizacionBundle\Entity\Personalizacion")
     */
    private $personalizacion;


    public function __construct()
    {
        $this->fecha = new \DateTime();
        $this->numeroPedido = rand(1,1000000);
        $this->estado = "en proceso"; //enviado - completado
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Compra
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set numeroPedido
     *
     * @param string $numeroPedido
     */
    public function setNumeroPedido($numeroPedido)
    {
        $this->numeroPedido = $numeroPedido;
    }

    /**
     * Get numeroPedido
     *
     * @return string
     */
    public function getNumeroPedido()
    {
        return $this->numeroPedido;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Compra
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set precio
     *
     * @param decimal $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get precio
     *
     * @return decimal
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set precioTotal
     *
     * @param decimal $precioTotal
     */
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;
    }

    /**
     * Get precioTotal
     *
     * @return decimal
     */
    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Compra
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set personalizacion
     */
    public function setPersonalizacion(\Proyecto\PersonalizacionBundle\Entity\Personalizacion $personalizacion)
    {
        $this->personalizacion = $personalizacion;
    }

    /**
     * Get personalizacion
     */
    public function getPersonalizacion()
    {
        return $this->personalizacion;
    }

}
