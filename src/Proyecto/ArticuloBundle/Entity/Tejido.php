<?php

namespace Proyecto\ArticuloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * Proyecto\ArticuloBundle\Entity\Tejido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\ArticuloBundle\Entity\TejidoRepository")
 */
class Tejido
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
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="estampado", type="string", length=255)
     */
    private $estampado;

    /**
     * @var integer $color
     *
     * @ORM\ManyToOne(targetEntity="Proyecto\ArticuloBundle\Entity\Color", inversedBy="tejidos")
     * @Assert\Type("Proyecto\ArticuloBundle\Entity\Color")
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255)
     */
    private $genero;

    /**
     * @ORM\Column(type="string")
     */
    private $rutaFoto;

    /**
     * @Assert\Image(maxSize = "900k")
     */
    private $foto;


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
     * @return Tejido
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
     * @return Tejido
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
     * Set estampado
     *
     * @param string $estampado
     * @return Tejido
     */
    public function setEstampado($estampado)
    {
        $this->estampado = $estampado;

        return $this;
    }

    /**
     * Get estampado
     *
     * @return string 
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

    /**
     * Set genero
     *
     * @param string $genero
     * @return Tejido
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
}
