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
            'Marrón',
            'Base',
        );

        foreach ($colores as $nombre) {
            $color = new Color();
            $color->setNombre($nombre);

            switch($nombre) {
                case 'Azul':
                    $color->setRutaFoto('azul.png');
                    $color->setSlug('azul');
                    break;
                case 'Rojo':
                    $color->setRutaFoto('rojo.png');
                    $color->setSlug('rojo');
                    break;
                case 'Verde':
                    $color->setRutaFoto('verde.png');
                    $color->setSlug('verde');
                    break;
                case 'Blanco':
                    $color->setRutaFoto('blanco.png');
                    $color->setSlug('blanco');
                    break;
                case 'Amarillo':
                    $color->setRutaFoto('amarillo.png');
                    $color->setSlug('amarillo');
                    break;
                case 'Negro':
                    $color->setRutaFoto('negro.png');
                    $color->setSlug('negro');
                    break;
                case 'Naranja':
                    $color->setRutaFoto('naranja.png');
                    $color->setSlug('naranja');
                    break;
                case 'Rosa':
                    $color->setRutaFoto('rosa.png');
                    $color->setSlug('rosa');
                    break;
                case 'Marrón':
                    $color->setRutaFoto('marron.png');
                    $color->setSlug('marron');
                    break;
                case 'Base':
                    $color->setRutaFoto('colorbase.png');
                    $color->setSlug('base');
                    break;
            }

            $manager->persist($color);
        }

        $manager->flush();
    }

}