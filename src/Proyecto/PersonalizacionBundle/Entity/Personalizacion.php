<?php

namespace Proyecto\PersonalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * Proyecto\PersonalizacionBundle\Entity\Personalizacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\PersonalizacionBundle\Entity\PersonalizacionRepository")
 */
class Personalizacion
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
     * @ORM\Column(type="string")
     */
    private $rutaFoto;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(min = 0)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="listaAccesorios", type="text")
     */
    private $listaAccesorios;

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
     * @var integer $articulo
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Articulo", inversedBy="personalizaciones")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Articulo")
     */
    private $articulo;

    /**
     * @var integer $talla
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Talla", inversedBy="personalizaciones")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Talla")
     */
    private $talla;

    /**
     * @var integer $tejido
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Tejido", inversedBy="personalizaciones")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Tejido")
     */
    private $tejido;

    /**
     * @var integer $estampado
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Estampado", inversedBy="personalizaciones")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Estampado")
     */
    private $estampado;

    /**
     * @var integer $color
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Color", inversedBy="personalizaciones")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Color")
     */
    private $color;


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
     * Set listaAccesorios
     *
     * @param string $listaAccesorios
     * @return Personalizacion
     */
    public function setListaAccesorios($listaAccesorios)
    {
        $this->listaAccesorios = $listaAccesorios;

        return $this;
    }

    /**
     * Get listaAccesorios
     *
     * @return string
     */
    public function getListaAccesorios()
    {
        return $this->listaAccesorios;
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
     * Set articulo
     */
    public function setArticulo(\Proyecto\ArticuloBundle\Entity\Articulo $articulo)
    {
        $this->articulo = $articulo;
    }

    /**
     * Get articulo
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Set talla
     */
    public function setTalla(\Proyecto\ArticuloBundle\Entity\Talla $talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get talla
     */
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set tejido
     */
    public function setTejido(\Proyecto\ArticuloBundle\Entity\Tejido $tejido)
    {
        $this->tejido = $tejido;
    }

    /**
     * Get tejido
     */
    public function getTejido()
    {
        return $this->tejido;
    }

    /**
     * Set estampado
     */
    public function setEstampado(\Proyecto\ArticuloBundle\Entity\Estampado $estampado)
    {
        $this->estampado = $estampado;
    }

    /**
     * Get estampado
     */
    public function getEstampado()
    {
        return $this->estampado;
    }

    /**
     * Set color
     */
    public function setColor(\Proyecto\ArticuloBundle\Entity\Color $color)
    {
        $this->color = $color;
    }

    /**
     * Get color
     */
    public function getColor()
    {
        return $this->color;
    }

}
