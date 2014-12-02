<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Color;

/**
 * Fixtures de la entidad Color
 * Crea todos los colores disponibles
 */
class Colores extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $colores = array(
            'Azul',
            'Rojo',
            'Verde',
            'Blanco',
            'Amarillo',
            'Negro',
            'Naranja',
            'Rosa',
            'Marron',
        );

        foreach ($colores as $nombre) {
            $color = new Color();
            $color->setNombre($nombre);
            $color->setRutaFoto('foto.jpg');
            $color->setSlug($nombre);

            $manager->persist($color);
        }

        $manager->flush();
    }

}