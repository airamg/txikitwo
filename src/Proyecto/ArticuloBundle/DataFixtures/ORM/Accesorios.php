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
            'Goma',
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
            $accesorio->setGenero('ambos');
            $accesorio->setRutaFoto('foto.jpg');
            $accesorio->setSlug($nombre);
            $accesorio->setPrecio(number_format(rand(100, 10000)/100, 2));

            $manager->persist($accesorio);
        }

        $manager->flush();
    }

}