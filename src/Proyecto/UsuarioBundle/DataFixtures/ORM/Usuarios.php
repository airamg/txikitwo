<?php

namespace Proyecto\UsuarioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\UsuarioBundle\Entity\Usuario;

/**
 * Fixtures de la entidad Usuario
 * Crea 2 usuarios de prueba
 */
class Usuarios extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $usuario1 = new Usuario();
        $usuario1->setNombre('Usuario');
        $usuario1->setApellido1('Prueba');
        $usuario1->setApellido2('Txikitwo');
        $usuario1->setEmail('usuarioprueba@txikitwo.com');
        $usuario1->setPassword('usuarioprueba');
        $usuario1->setDireccion('Av. Txikitwo, 123, 1A. Txikitwo.');
        $usuario1->setCodigoPostal('12345');

        $usuario2 = new Usuario();
        $usuario2->setNombre('User');
        $usuario2->setApellido1('Primero');
        $usuario2->setApellido2('Segundo');
        $usuario2->setEmail('userprueba@txikitwo.com');
        $usuario2->setPassword('userprueba');
        $usuario2->setDireccion('Calle Falsa, 456, 3B. Txikitwo.');
        $usuario2->setCodigoPostal('12345');
        $usuario2->setOnline('0');

        $manager->persist($usuario1);
        $manager->persist($usuario2);
        $manager->flush();
    }
}