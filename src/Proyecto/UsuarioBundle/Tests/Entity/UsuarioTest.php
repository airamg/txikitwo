<?php

namespace Proyecto\UsuarioBundle\Tests;

use Proyecto\UsuarioBundle\UsuarioBundle;
use Symfony\Component\Validator\Validation;
use Proyecto\UsuarioBundle\Entity\Usuario;

/**
 * Test unitario para la entidad Usuario
 */
class UsuarioTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    protected function setUp()
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();
    }

    public function testValidarRole()
    {
        $usuario = new Usuario();
        $role = $usuario->getRole();
        $this->assertEquals('user', $role);
    }


}