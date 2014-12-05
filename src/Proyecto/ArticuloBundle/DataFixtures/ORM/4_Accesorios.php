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
            'Lazos',
            'Larguras',
            'Mangas',
            'Nombres bordados',
            'Velcro',
            'Volantes',
        );

        foreach ($accesorios as $nombre) {
            $accesorio = new Accesorio();
            $accesorio->setNombre($nombre);

            switch($nombre) {
                case 'Bolsillos':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('bolsillo.png');
                    $accesorio->setSlug('bolsillos');
                    $accesorio->setPrecio(2.50);
                    break;
                case 'Botones':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('botones.png');
                    $accesorio->setSlug('botones');
                    $accesorio->setPrecio(1.30);
                    break;
                case 'Cremallera':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('cremallera.png');
                    $accesorio->setSlug('cremallera');
                    $accesorio->setPrecio(3.90);
                    break;
                case 'Cuellos':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('blank.png');
                    $accesorio->setSlug('cuellos');
                    $accesorio->setPrecio(0.00);
                    break;
                case 'Lazos':
                    $accesorio->setGenero('niña');
                    $accesorio->setRutaFoto('lazo.png');
                    $accesorio->setSlug('lazos');
                    $accesorio->setPrecio(1.20);
                    break;
                case 'Larguras':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('blank.png');
                    $accesorio->setSlug('larguras');
                    $accesorio->setPrecio(0.00);
                    break;
                case 'Mangas':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('blank.png');
                    $accesorio->setSlug('mangas');
                    $accesorio->setPrecio(0.00);
                    break;
                case 'Nombres bordados':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('blank.png');
                    $accesorio->setSlug('nombres-bordados');
                    $accesorio->setPrecio(5.55);
                    break;
                case 'Velcro':
                    $accesorio->setGenero('ambos');
                    $accesorio->setRutaFoto('blank.png');
                    $accesorio->setSlug('velcro');
                    $accesorio->setPrecio(2.95);
                    break;
                case 'Volantes':
                    $accesorio->setGenero('niña');
                    $accesorio->setRutaFoto('volante.png');
                    $accesorio->setSlug('volantes');
                    $accesorio->setPrecio(0.20);
                    break;
            }

            $manager->persist($accesorio);
        }

        $manager->flush();
    }

}