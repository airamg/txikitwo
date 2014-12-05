<?php

namespace Proyecto\PersonalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($genero)
    {
        return $this->render('PersonalizacionBundle:Default:personalizacion.html.twig', array('name' => $genero));
    }

    public function articuloselectAction($genero, $articulo)
    {
        return $this->render('PersonalizacionBundle:Default:articuloselect.html.twig', array('name' => $genero, 'names' => $articulo));
    }
}
