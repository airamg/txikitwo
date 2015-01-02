<?php

namespace Proyecto\ArticuloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\ArticuloBundle\Entity\Articulo;

/**
 * Fixtures de la entidad Articulo
 * Crea todos los articulos que podrá haber disponibles en la aplicación según genero
 */
class Articulos extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {

        //niña
        $articulo1 = new Articulo();
        $articulo1->setNombre("Abrigo");
        $articulo1->setSlug('abrigo');
        $articulo1->setGenero('nina');
        $articulo1->setRutaFoto('articulo/nina/abrigo.png');
        $articulo1->setPrecio(30.00);
        $articulo1->setDescripcion('Ropa formal');
        $articulo1->setEstampado('-');
        $articulo1->setColor('blanco');
        $articulo1->setTejido('algodon');
        $articulo1->setComplemento('0');

        $articulo2 = new Articulo();
        $articulo2->setNombre("Bata");
        $articulo2->setSlug('bata');
        $articulo2->setGenero('nina');
        $articulo2->setRutaFoto('articulo/nina/bata.png');
        $articulo2->setPrecio(18.00);
        $articulo2->setDescripcion('Ropa para el colegio');
        $articulo2->setEstampado('cuadros');
        $articulo2->setColor('verde');
        $articulo2->setTejido('algodon');
        $articulo2->setComplemento('0');

        $articulo3 = new Articulo();
        $articulo3->setNombre("Camisa");
        $articulo3->setSlug('camisa');
        $articulo3->setGenero('nina');
        $articulo3->setRutaFoto('articulo/nina/camisa.png');
        $articulo3->setPrecio(14.00);
        $articulo3->setDescripcion('Ropa formal');
        $articulo3->setEstampado('flores');
        $articulo3->setColor('rosa');
        $articulo3->setTejido('seda');
        $articulo3->setComplemento('0');

        $articulo4 = new Articulo();
        $articulo4->setNombre("Camiseta");
        $articulo4->setSlug('camiseta');
        $articulo4->setGenero('nina');
        $articulo4->setRutaFoto('articulo/nina/camiseta.png');
        $articulo4->setPrecio(9.00);
        $articulo4->setDescripcion('Ropa informal');
        $articulo4->setEstampado('estrellas');
        $articulo4->setColor('azul');
        $articulo4->setTejido('algodon');
        $articulo4->setComplemento('0');

        $articulo5 = new Articulo();
        $articulo5->setNombre("Falda");
        $articulo5->setSlug('falda');
        $articulo5->setGenero('nina');
        $articulo5->setRutaFoto('articulo/nina/falda.png');
        $articulo5->setPrecio(12.00);
        $articulo5->setDescripcion('Ropa informal');
        $articulo5->setEstampado('rayas');
        $articulo5->setColor('blanco');
        $articulo5->setTejido('seda');
        $articulo5->setComplemento('0');

        $articulo6 = new Articulo();
        $articulo6->setNombre("Jersey");
        $articulo6->setSlug('jersey');
        $articulo6->setGenero('nina');
        $articulo6->setRutaFoto('articulo/nina/jersey.png');
        $articulo6->setPrecio(13.00);
        $articulo6->setDescripcion('Ropa informal');
        $articulo6->setEstampado('rayas');
        $articulo6->setColor('naranja');
        $articulo6->setTejido('lana');
        $articulo6->setComplemento('0');

        $articulo7 = new Articulo();
        $articulo7->setNombre("Pantalón");
        $articulo7->setSlug('pantalón');
        $articulo7->setGenero('nina');
        $articulo7->setRutaFoto('articulo/nina/pantalon.png');
        $articulo7->setPrecio(19.00);
        $articulo7->setDescripcion('Ropa informal');
        $articulo7->setEstampado('lunares');
        $articulo7->setColor('rosa');
        $articulo7->setTejido('algodon');
        $articulo7->setComplemento('0');

        $articulo8 = new Articulo();
        $articulo8->setNombre("Vestido");
        $articulo8->setSlug('vestido');
        $articulo8->setGenero('nina');
        $articulo8->setRutaFoto('articulo/nina/vestido.png');
        $articulo8->setPrecio(23.00);
        $articulo8->setDescripcion('Ropa formal');
        $articulo8->setEstampado('-');
        $articulo8->setColor('marron');
        $articulo8->setTejido('algodon');
        $articulo8->setComplemento('0');


        //niño
        $articulo9 = new Articulo();
        $articulo9->setNombre("Abrigo");
        $articulo9->setSlug('abrigo');
        $articulo9->setGenero('nino');
        $articulo9->setRutaFoto('articulo/nino/abrigo.png');
        $articulo9->setPrecio(31.00);
        $articulo9->setDescripcion('Ropa formal');
        $articulo9->setEstampado('-');
        $articulo9->setColor('marron');
        $articulo9->setTejido('algodon');
        $articulo9->setComplemento('0');

        $articulo10 = new Articulo();
        $articulo10->setNombre("Bata");
        $articulo10->setSlug('bata');
        $articulo10->setGenero('nino');
        $articulo10->setRutaFoto('articulo/nino/bata.png');
        $articulo10->setPrecio(18.00);
        $articulo10->setDescripcion('Ropa para el colegio');
        $articulo10->setEstampado('cuadros');
        $articulo10->setColor('verde');
        $articulo10->setTejido('algodon');
        $articulo10->setComplemento('0');

        $articulo11 = new Articulo();
        $articulo11->setNombre("Camisa");
        $articulo11->setSlug('camisa');
        $articulo11->setGenero('nino');
        $articulo11->setRutaFoto('articulo/nino/camisa.png');
        $articulo11->setPrecio(14.00);
        $articulo11->setDescripcion('Ropa formal');
        $articulo11->setEstampado('cuadros');
        $articulo11->setColor('azul');
        $articulo11->setTejido('seda');
        $articulo11->setComplemento('0');

        $articulo12 = new Articulo();
        $articulo12->setNombre("Camiseta");
        $articulo12->setSlug('camiseta');
        $articulo12->setGenero('nino');
        $articulo12->setRutaFoto('articulo/nino/camiseta.png');
        $articulo12->setPrecio(8.00);
        $articulo12->setDescripcion('Ropa informal');
        $articulo12->setEstampado('-');
        $articulo12->setColor('naranja');
        $articulo12->setTejido('algodon');
        $articulo12->setComplemento('0');

        $articulo13 = new Articulo();
        $articulo13->setNombre("Jersey");
        $articulo13->setSlug('jersey');
        $articulo13->setGenero('nino');
        $articulo13->setRutaFoto('articulo/nino/jersey.png');
        $articulo13->setPrecio(13.00);
        $articulo13->setDescripcion('Ropa informal');
        $articulo13->setEstampado('rayas');
        $articulo13->setColor('verde');
        $articulo13->setTejido('lana');
        $articulo13->setComplemento('0');

        $articulo14 = new Articulo();
        $articulo14->setNombre("Pantalón");
        $articulo14->setSlug('pantalón');
        $articulo14->setGenero('nino');
        $articulo14->setRutaFoto('articulo/nino/pantalon.png');
        $articulo14->setPrecio(19.00);
        $articulo14->setDescripcion('Ropa informal');
        $articulo14->setEstampado('-');
        $articulo14->setColor('rojo');
        $articulo14->setTejido('algodon');
        $articulo14->setComplemento('0');

        $manager->persist($articulo1);
        $manager->persist($articulo2);
        $manager->persist($articulo3);
        $manager->persist($articulo4);
        $manager->persist($articulo5);
        $manager->persist($articulo6);
        $manager->persist($articulo7);
        $manager->persist($articulo8);
        $manager->persist($articulo9);
        $manager->persist($articulo10);
        $manager->persist($articulo11);
        $manager->persist($articulo12);
        $manager->persist($articulo13);
        $manager->persist($articulo14);

        $manager->flush();

    }

}