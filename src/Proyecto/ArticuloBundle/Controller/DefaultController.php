<?php

namespace Proyecto\ArticuloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ArticuloBundle:Default:index.html.twig');
    }
}
