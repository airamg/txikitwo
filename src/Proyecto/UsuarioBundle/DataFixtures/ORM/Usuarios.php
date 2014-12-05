<?php

namespace Proyecto\UsuarioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\UsuarioBundle\Entity\Usuario;

/**
 * Fixtures de la entidad Usuario
 * Crea 1 usuario de prueba
 */
class Usuarios extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $usuario = new Usuario();

        $usuario->setNombre('Usuario');
        $usuario->setApellido1('Prueba');
        $usuario->setApellido2('Txikitwo');
        $usuario->setEmail('usuarioprueba@txikitwo.com');
        $usuario->setRutaFoto('defaultuser.png');
        $usuario->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
        $usuario->setPassword('usuarioprueba');
        $usuario->setDireccion('Av. Txikitwo, 123, 1A. Prueba.');
        $usuario->setCodigoPostal('12345');
        $usuario->setComprasRealizadas('1');
        $usuario->setComprasPendientes('0');

        $manager->persist($usuario);
        $manager->flush();
    }
}