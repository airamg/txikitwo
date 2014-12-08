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
     * @var string
     *
     * @ORM\Column(name="articulo", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $articulo;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $genero;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $color;

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
     * @return Personalizacion
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
     * Set realizada
     *
     * @param string $realizada
     * @return Personalizacion
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
     * @return Personalizacion
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
     * Set articulo
     *
     * @param string $articulo
     * @return Personalizacion
     */
    public function setArticulo($articulo)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return string
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return Personalizacion
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
     * Set color
     *
     * @param string $color
     * @return Personalizacion
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
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

}
