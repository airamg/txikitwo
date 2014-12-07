<?php

namespace Proyecto\PersonalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\PersonalizacionBundle\Form\PersonalizacionType;
use Proyecto\PersonalizacionBundle\Entity\Personalizacion;

class DefaultController extends Controller
{
    public function indexAction($genero)
    {
        return $this->render('PersonalizacionBundle:Default:personalizacion.html.twig', array('name' => $genero));
    }

    public function articuloselectAction($genero, $articulo)
    {
        $personalizacion = new Personalizacion();
        $formulario = $this->createForm(new PersonalizacionType(), $personalizacion);
        return $this->render('PersonalizacionBundle:Default:articuloselect.html.twig', array(
            'name' => $genero,
            'names' => $articulo,
            'formulario' => $formulario->createView()
        ));
    }

    public function selectsformAction()
    {
        $personalizacion = new Personalizacion();
        $formulario = $this->createForm(new PersonalizacionType(), $personalizacion);
        return $this->render('PersonalizacionBundle:Default:articuloselect.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }
}
