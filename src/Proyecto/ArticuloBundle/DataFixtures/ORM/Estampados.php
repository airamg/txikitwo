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
            'Lunares',
            'Estrellas',
            'Rayas',
            'Dibujos',
            'Cuadros',
        );

        foreach ($estampados as $nombre) {
            $estampado = new Estampado();
            $estampado->setNombre($nombre);

            switch($nombre) {
               case 'Flores':
                    $estampado->setSlug('flores');
                    $estampado->setRutaFoto('almacen/estampado/flores.png');
                    break;
                case 'Lunares':
                    $estampado->setSlug('lunares');
                    $estampado->setRutaFoto('almacen/estampado/lunares.png');
                    break;
                case 'Estrellas':
                    $estampado->setSlug('estrellas');
                    $estampado->setRutaFoto('almacen/estampado/estrellas.png');
                    break;
                case 'Rayas':
                    $estampado->setSlug('rayas');
                    $estampado->setRutaFoto('almacen/estampado/rayas.png');
                    break;
                case 'Dibujos':
                    $estampado->setSlug('dibujos');
                    $estampado->setRutaFoto('almacen/estampado/dibujos.png');
                    break;
                case 'Cuadros':
                    $estampado->setSlug('cuadros');
                    $estampado->setRutaFoto('almacen/estampado/cuadros.png');
                    break;
            }

            $manager->persist($estampado);
        }

        $manager->flush();
    }

}