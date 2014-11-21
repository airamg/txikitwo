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
     * @var string
     *
     * @ORM\Column(name="talla", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $talla;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="tejido", type="string", length=255)
     * @Assert\NotBlank()
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
     * Set tejido
     *
     * @param string $tejido
     * @return Personalizacion
     */
    public function setTejido($tejido)
    {
        $this->tejido = $tejido;

        return $this;
    }

    /**
     * Get tejido
     *
     * @return string 
     */
    public function getTejido()
    {
        return $this->tejido;
    }
}
