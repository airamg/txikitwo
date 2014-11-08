<?php

namespace Proyecto\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BackendBundle:Default:personalizacion.html.twig', array('name' => $name));
    }
}
