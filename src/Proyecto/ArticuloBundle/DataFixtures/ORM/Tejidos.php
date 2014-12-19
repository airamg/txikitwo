<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Tejido;

/**
 * Fixtures de la entidad Tejido
 * Crea todos los tejidos disponibles
 */
class Tejidos extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
       $tejidos = array(
           'Lana',
           'Seda',
           'Algodón',
        );

        foreach ($tejidos as $nombre) {
            $tejido = new Tejido();
            $tejido->setNombre($nombre);

            switch($nombre) {
                case 'Lana':
                    $tejido->setSlug('lana');
                    $tejido->setPrecio(2.60);
                    break;
                case 'Seda':
                    $tejido->setSlug('seda');
                    $tejido->setPrecio(4.00);
                    break;
                case 'Algodón':
                    $tejido->setSlug('algodón');
                    $tejido->setPrecio(3.00);
                    break;
            }

            $manager->persist($tejido);
        }

        $manager->flush();
    }

}