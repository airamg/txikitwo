<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Articulo;

/**
 * Fixtures de la entidad Articulo
 * Crea todos los articulos que podrá haber disponibles en la aplicación
 */
class Articulos extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $articulos = array(
            'Abrigos',
            'Batas',
            'Blusas',
            'Calcetines',
            'Camisas',
            'Camisetas',
            'Chalecos',
            'Faldas',
            'Gorros',
            'Jerséis',
            'Leotardos',
            'Pantalones',
            'Pijamas',
            'Vestidos',
        );

        foreach ($articulos as $nombre) {
            $articulo = new Articulo();
            $articulo->setNombre($nombre);

            // generos
            if($nombre=='Blusas' || $nombre=='Faldas' || $nombre=='Leotardos' || $nombre=='Vestidos') {
                $articulo->setGenero('niña');
            }
            else {
                $articulo->setGenero('ambos');
            }

            // complementos
            if($nombre=='Calcetines' || $nombre=='Leotardos' || $nombre=='Gorros') {
                $articulo->setComplemento('1');
            }
            else {
                $articulo->setComplemento('0');
            }

            // descripción, foto, precio y slug
            switch($nombre) {
                case 'Abrigos':
                    $articulo->setRutaFoto('abrigo.png');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(20.00);
                    $articulo->setSlug('abrigo');
                    break;
                case 'Batas':
                    $articulo->setRutaFoto('bata.png');
                    $articulo->setDescripcion('Ropa para el colegio');
                    $articulo->setPrecio(18.00);
                    $articulo->setSlug('bata');
                    break;
                case 'Blusas':
                    $articulo->setRutaFoto('blusa.png');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(10.00);
                    $articulo->setSlug('blusa');
                    break;
                case 'Calcetines':
                    $articulo->setRutaFoto('calcetin.png');
                    $articulo->setDescripcion('Complemento');
                    $articulo->setPrecio(4.00);
                    $articulo->setSlug('calcetin');
                    break;
                case 'Camisas':
                    $articulo->setRutaFoto('camisa.png');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(12.00);
                    $articulo->setSlug('camisa');
                    break;
                case 'Camisetas':
                    $articulo->setRutaFoto('camiseta.png');
                    $articulo->setDescripcion('Ropa informal');
                    $articulo->setPrecio(7.00);
                    $articulo->setSlug('camiseta');
                    break;
                case 'Chalecos':
                    $articulo->setRutaFoto('chaleco.png');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(15.00);
                    $articulo->setSlug('chaleco');
                    break;
                case 'Faldas':
                    $articulo->setRutaFoto('falda.png');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(11.00);
                    $articulo->setSlug('falda');
                    break;
                case 'Gorros':
                    $articulo->setRutaFoto('gorro.png');
                    $articulo->setDescripcion('Complemento');
                    $articulo->setPrecio(5.00);
                    $articulo->setSlug('gorro');
                    break;
                case 'Jerséis':
                    $articulo->setRutaFoto('jersey.png');
                    $articulo->setDescripcion('Ropa informal');
                    $articulo->setPrecio(12.00);
                    $articulo->setSlug('jersey');
                    break;
                case 'Leotardos':
                    $articulo->setRutaFoto('leotardos.png');
                    $articulo->setDescripcion('Complemento');
                    $articulo->setPrecio(9.00);
                    $articulo->setSlug('leotardos');
                    break;
                case 'Pantalones':
                    $articulo->setRutaFoto('pantalon.png');
                    $articulo->setDescripcion('Ropa informal');
                    $articulo->setPrecio(19.00);
                    $articulo->setSlug('pantalon');
                    break;
                case 'Pijamas':
                    $articulo->setRutaFoto('pijama.png');
                    $articulo->setDescripcion('Ropa para dormir');
                    $articulo->setPrecio(22.00);
                    $articulo->setSlug('pijama');
                    break;
                case 'Vestidos':
                    $articulo->setRutaFoto('vestido.png');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(23.00);
                    $articulo->setSlug('vestido');
                    break;
            }

            $manager->persist($articulo);
        }

        $manager->flush();
    }

}