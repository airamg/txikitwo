<?php

namespace Proyecto\ArticuloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * Proyecto\ArticuloBundle\Entity\Articulo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\ArticuloBundle\Entity\ArticuloRepository")
 */
class Articulo
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
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string")
     * @Assert\NotBlank()
     */
    private $slug;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(min = 0)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="disponible", type="string", length=1)
     * @Assert\NotBlank()
     */
    private $disponible;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

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
     * @ORM\Column(name="vecesPersonalizado", type="string")
     * @Assert\NotBlank()
     */
    private $vecesPersonalizado;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=1)
     * @Assert\NotBlank()
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $genero;

    /**
     * @var integer $estampado
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Estampado", inversedBy="articulos")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Estampado")
     */
    private $estampado;


    public function __construct()
    {
        $this->setVecesPersonalizado('0');
        $this->setDisponible('1');
    }

    public function __toString()
    {
        return $this->getNombre();
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
     * @return Articulo
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
     * Set slug
     *
     * @param string $slug
     * @return Articulo
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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
     * Set disponible
     *
     * @param string $disponible
     * @return Articulo
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return string 
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Articulo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Set vecesPersonalizado
     *
     * @param string $vecesPersonalizado
     * @return Articulo
     */
    public function setVecesPersonalizado($vecesPersonalizado)
    {
        $this->vecesPersonalizado = $vecesPersonalizado;

        return $this;
    }

    /**
     * Get vecesPersonalizado
     *
     * @return string 
     */
    public function getVecesPersonalizado()
    {
        return $this->vecesPersonalizado;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return Articulo
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return Articulo
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
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
}
