<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Accesorio;

/**
 * Fixtures de la entidad Accesorio
 * Crea todos los accesorios disponibles
 */
class Accesorios extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
       $accesorios = array(
            'Bolsillos',
            'Botones',
            'Cremallera',
            'Cuellos',
            'Larguras',
            'Mangas',
        );

        foreach ($accesorios as $nombre) {
            $accesorio = new Accesorio();
            $accesorio->setNombre($nombre);

            switch($nombre) {
                case 'Bolsillos':
                    $accesorio->setGenero('ambos');
                    $accesorio->setSlug('bolsillos');
                    $accesorio->setPrecio(2.50);
                    break;
                case 'Botones':
                    $accesorio->setGenero('ambos');
                    $accesorio->setSlug('botones');
                    $accesorio->setPrecio(1.30);
                    break;
                case 'Cremallera':
                    $accesorio->setGenero('ambos');
                    $accesorio->setSlug('cremallera');
                    $accesorio->setPrecio(3.90);
                    break;
                case 'Cuellos':
                    $accesorio->setGenero('ambos');
                    $accesorio->setSlug('cuellos');
                    $accesorio->setPrecio(0.00);
                    break;
                case 'Larguras':
                    $accesorio->setGenero('ambos');
                    $accesorio->setSlug('larguras');
                    $accesorio->setPrecio(0.00);
                    break;
                case 'Mangas':
                    $accesorio->setGenero('ambos');
                    $accesorio->setSlug('mangas');
                    $accesorio->setPrecio(0.00);
                    break;
            }

            $manager->persist($accesorio);
        }

        $manager->flush();
    }

}