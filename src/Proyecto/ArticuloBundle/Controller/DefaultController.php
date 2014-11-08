<?php

namespace Proyecto\ArticuloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ArticuloBundle:Default:personalizacion.html.twig');
    }

    public function busquedaindexAction()
    {
        return $this->render('ArticuloBundle:Busqueda:busqueda_index.html.twig');
    }
}
