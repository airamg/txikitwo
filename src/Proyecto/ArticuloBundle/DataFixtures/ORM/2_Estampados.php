<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Proyecto\ArticuloBundle\Entity\Estampado;

/**
 * Fixtures de la entidad Estampado
 * Crea todos los estampados disponibles
 */
class Estampados extends AbstractFixture implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $colores = $manager->getRepository('ArticuloBundle:Color')->findAll();

        $estampados = array(
            'Flores',
            'Rayas',
            'Dibujos',
            'Base',
        );

        foreach ($estampados as $nombre) {
            $estampado = new Estampado();
            $estampado->setNombre($nombre);

            switch($nombre) {
                case 'Flores':
                    $estampado->setSlug('flores');
                    $estampado->setRutaFoto('flores.png');
                    $estampado->setGenero('niña');
                    $color = $colores[array_rand($colores)];
                    $estampado->setColor($color);
                    break;
                case 'Rayas':
                    $estampado->setSlug('rayas');
                    $estampado->setRutaFoto('rayas.png');
                    $estampado->setGenero('ambos');
                    $color = $colores[array_rand($colores)];
                    $estampado->setColor($color);
                    break;
                case 'Dibujos':
                    $estampado->setSlug('dibujos');
                    $estampado->setRutaFoto('dibujos.png');
                    $estampado->setGenero('ambos');
                    $color = $colores[array_rand($colores)];
                    $estampado->setColor($color);
                    break;
                case 'Base':
                    $estampado->setSlug('base');
                    $estampado->setRutaFoto('estampadobase.png');
                    $estampado->setGenero('ambos');
                    $color = $colores[array_rand($colores)];
                    $estampado->setColor($color);
                    break;
            }

            $manager->persist($estampado);
        }

        $manager->flush();
    }

}