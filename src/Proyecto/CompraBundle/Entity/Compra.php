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
     * @var string
     *
     * @ORM\Column(name="realizada", type="string", length=1)
     * @Assert\NotBlank()
     */
    private $realizada;

    /**
     * @var string
     *
     * @ORM\Column(name="pendiente", type="string", length=1)
     * @Assert\NotBlank()
     */
    private $pendiente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     * @Assert\DateTime()
     */
    private $fecha;

    /**
     * @var integer $usuario
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\UsuarioBundle\Entity\Usuario", inversedBy="compras")
     * @Assert\Type("Proyecto\UsuarioBundle\Entity\Usuario")
     */
    private $usuario;


    public function __construct()
    {
        $this->fecha = new \DateTime();
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
     * Set realizada
     *
     * @param string $realizada
     * @return Compra
     */
    public function setRealizada($realizada)
    {
        $this->realizada = $realizada;

        return $this;
    }

    /**
     * Get realizada
     *
     * @return string 
     */
    public function getRealizada()
    {
        return $this->realizada;
    }

    /**
     * Set pendiente
     *
     * @param string $pendiente
     * @return Compra
     */
    public function setPendiente($pendiente)
    {
        $this->pendiente = $pendiente;

        return $this;
    }

    /**
     * Get pendiente
     *
     * @return string 
     */
    public function getPendiente()
    {
        return $this->pendiente;
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
     * Set usuario
     */
    public function setUsuario(\Proyecto\UsuarioBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

}
