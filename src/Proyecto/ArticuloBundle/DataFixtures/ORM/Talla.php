<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Talla;

/**
 * Fixtures de la entidad Talla
 * Crea todas los tallas disponibles
 */
class Tallas extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $tallas = array(
            '12-18 meses',
            '18-24 meses',
            '2 años',
            '3 años',
        );

        foreach ($tallas as $nombre) {
            $talla= new Talla();
            $talla->setNombre($nombre);

            switch($nombre) {
                case '12-18 meses':
                    $talla->setSlug('0');
                   break;
                case '18-24 meses':
                    $talla->setSlug('1');
                   break;
                case '2 años':
                    $talla->setSlug('2');
                    break;
                case '3 años':
                    $talla->setSlug('3');
                    break;
            }

            $manager->persist($talla);
        }

        $manager->flush();
    }

}