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
     * @Assert\Image(maxSize = "900k")
     */
    private $foto;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(min = 0)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="talla", type="string")
     * @Assert\NotBlank()
     */
    private $talla;

    /**
     * @var string
     *
     * @ORM\Column(name="listaAccesorios", type="text")
     */
    private $listaAccesorios;

    /**
     * @var integer $articulo
     *
     * @ORM\OneToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Articulo")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Articulo")
     */
    private $articulo;

    /**
     * @var integer $compra
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\CompraBundle\Entity\Compra", inversedBy="personalizaciones")
     * @Assert\Type("Proyecto\CompraBundle\Entity\Compra")
     */
    private $compra;


    public function __construct()
    {

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
     * Set talla
     *
     * @param string $talla
     * @return Personalizacion
     */
    public function setTalla($talla)
    {
        $this->talla = $talla;

        return $this;
    }

    /**
     * Get talla
     *
     * @return string
     */
    public function getTalla()
    {
        return $this->talla;
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
