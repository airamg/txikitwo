<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Proyecto\ArticuloBundle\Entity\Tejido;

/**
 * Fixtures de la entidad Tejido
 * Crea todos los tejidos disponibles
 */
class Tejidos extends AbstractFixture implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $colores = $manager->getRepository('ArticuloBundle:Color')->findAll();

        $tejidos = array(
            'Base',
            'Prueba',
        );

        foreach ($tejidos as $nombre) {
            $tejido = new Tejido();
            $tejido->setNombre($nombre);
            $tejido->setSlug($nombre);
            $tejido->setEstampado('estampado');
            $tejido->setRutaFoto('foto.jpg');
            $tejido->setGenero('ambos');
            $color = $colores[array_rand($colores)];
            $tejido->setColor($color);

            $manager->persist($tejido);
        }

        $manager->flush();
    }

}