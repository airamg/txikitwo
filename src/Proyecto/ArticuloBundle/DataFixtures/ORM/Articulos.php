<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Proyecto\ArticuloBundle\Entity\Articulo;

/**
 * Fixtures de la entidad Articulo
 * Crea todos los articulos que podrá haber disponibles en la aplicación
 */
class Articulos extends AbstractFixture implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $tejidos = $manager->getRepository('ArticuloBundle:Tejido')->findAll();

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
            'Jerseis',
            'Leotardos',
            'Pantalones',
            'Pijamas',
            'Vestidos',
        );

        foreach ($articulos as $nombre) {
            $articulo = new Articulo();
            $articulo->setNombre($nombre);

            //tejidos (buscar el tejido base de prueba) FALTA DE HACER

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
                    $articulo->setRutaFoto('abrigo.jpg');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('abrigo');
                    break;
                case 'Batas':
                    $articulo->setRutaFoto('bata.jpg');
                    $articulo->setDescripcion('Ropa para el colegio');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('bata');
                    break;
                case 'Blusas':
                    $articulo->setRutaFoto('blusa.jpg');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('blusa');
                    break;
                case 'Calcetines':
                    $articulo->setRutaFoto('calcetin.jpg');
                    $articulo->setDescripcion('Complemento');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('calcetin');
                    break;
                case 'Camisas':
                    $articulo->setRutaFoto('camisa.jpg');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('camisa');
                    break;
                case 'Camisetas':
                    $articulo->setRutaFoto('camiseta.jpg');
                    $articulo->setDescripcion('Ropa informal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('camiseta');
                    break;
                case 'Chalecos':
                    $articulo->setRutaFoto('chaleco.jpg');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('chaleco');
                    break;
                case 'Faldas':
                    $articulo->setRutaFoto('falda.jpg');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('falda');
                    break;
                case 'Gorros':
                    $articulo->setRutaFoto('gorro.jpg');
                    $articulo->setDescripcion('Complemento');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('gorro');
                    break;
                case 'Jerseis':
                    $articulo->setRutaFoto('jersey.jpg');
                    $articulo->setDescripcion('Ropa informal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('jersey');
                    break;
                case 'Leotardos':
                    $articulo->setRutaFoto('leotardos.jpg');
                    $articulo->setDescripcion('Complemento');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('leotardos');
                    break;
                case 'Pantalones':
                    $articulo->setRutaFoto('pantalon.jpg');
                    $articulo->setDescripcion('Ropa informal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('pantalon');
                    break;
                case 'Pijamas':
                    $articulo->setRutaFoto('pijama.jpg');
                    $articulo->setDescripcion('Ropa para dormir');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('pijama');
                    break;
                case 'Vestidos':
                    $articulo->setRutaFoto('vestido.jpg');
                    $articulo->setDescripcion('Ropa formal');
                    $articulo->setPrecio(number_format(rand(100, 10000)/100, 2));
                    $articulo->setSlug('vestido');
                    break;
            }

            $manager->persist($articulo);
        }

        $manager->flush();
    }

}