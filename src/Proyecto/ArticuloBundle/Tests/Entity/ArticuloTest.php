<?php

namespace Proyecto\ArticuloBundle\Tests;

use Symfony\Component\Validator\Validation;
use Proyecto\ArticuloBundle\Entity\Articulo;

/**
 * Test unitario para la entidad Articulo
 */
class ArticuloTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    protected function setUp()
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();
    }

    public function testValidarSlug()
    {
        $articulo = new Articulo();

        $articulo->setNombre('Camiseta');
        $slug = 'Camiseta';

        $this->assertEquals('camiseta', $slug);
    }





}