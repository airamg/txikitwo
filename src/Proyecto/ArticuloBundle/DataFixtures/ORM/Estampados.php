<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Estampado;

/**
 * Fixtures de la entidad Estampado
 * Crea todos los estampados disponibles
 */
class Estampados extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $estampados = array(
            'Flores',
            'Rayas',
            'Dibujos',
        );

        foreach ($estampados as $nombre) {
            $estampado = new Estampado();
            $estampado->setNombre($nombre);

            switch($nombre) {
                case 'Flores':
                    $estampado->setSlug('flores');
                    $estampado->setRutaFoto('flores.png');
                    $estampado->setGenero('niña');
                    break;
                case 'Rayas':
                    $estampado->setSlug('rayas');
                    $estampado->setRutaFoto('rayas.png');
                    $estampado->setGenero('ambos');
                    break;
                case 'Dibujos':
                    $estampado->setSlug('dibujos');
                    $estampado->setRutaFoto('dibujos.png');
                    $estampado->setGenero('ambos');
                    break;
            }

            $manager->persist($estampado);
        }

        $manager->flush();
    }

}