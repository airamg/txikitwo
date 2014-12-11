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
            'Naranja',
            'Rosa',
            'Marrón',
        );

        foreach ($colores as $nombre) {
            $color = new Color();
            $color->setNombre($nombre);

            switch($nombre) {
                case 'Azul':
                    $color->setRutaFoto('almacen/color/azul.png');
                    $color->setSlug('azul');
                    break;
                case 'Rojo':
                    $color->setRutaFoto('almacen/color/rojo.png');
                    $color->setSlug('rojo');
                    break;
                case 'Verde':
                    $color->setRutaFoto('almacen/color/verde.png');
                    $color->setSlug('verde');
                    break;
                case 'Blanco':
                    $color->setRutaFoto('almacen/color/blanco.png');
                    $color->setSlug('blanco');
                    break;
                case 'Naranja':
                    $color->setRutaFoto('almacen/color/naranja.png');
                    $color->setSlug('naranja');
                    break;
                case 'Rosa':
                    $color->setRutaFoto('almacen/color/rosa.png');
                    $color->setSlug('rosa');
                    break;
                case 'Marrón':
                    $color->setRutaFoto('almacen/color/marron.png');
                    $color->setSlug('marron');
                    break;
            }

            $manager->persist($color);
        }

        $manager->flush();
    }

}