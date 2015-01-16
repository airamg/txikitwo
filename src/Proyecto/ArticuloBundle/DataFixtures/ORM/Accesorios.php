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
            'Larguras',
            'Mangas',
            'Lazos',
            'Dibujos',
            'Nombres'
        );

        foreach ($accesorios as $nombre) {
            $accesorio = new Accesorio();
            $accesorio->setNombre($nombre);

            switch($nombre) {
                case 'Bolsillos':
                    $accesorio->setSlug('bolsillos');
                    $accesorio->setPrecio(2.50);
                    break;
                case 'Botones':
                    $accesorio->setSlug('botones');
                    $accesorio->setPrecio(1.30);
                    break;
                case 'Larguras':
                    $accesorio->setSlug('larguras');
                    $accesorio->setPrecio(0.20);
                    break;
                case 'Mangas':
                    $accesorio->setSlug('mangas');
                    $accesorio->setPrecio(0.20);
                    break;
                case 'Lazos':
                    $accesorio->setSlug('lazos');
                    $accesorio->setPrecio(2.00);
                    break;
                case 'Dibujos':
                    $accesorio->setSlug('dibujos');
                    $accesorio->setPrecio(0.50);
                    break;
                case 'Nombres':
                    $accesorio->setSlug('nombres');
                    $accesorio->setPrecio(1.10);
                    break;
            }

            $manager->persist($accesorio);
        }

        $manager->flush();
    }

}