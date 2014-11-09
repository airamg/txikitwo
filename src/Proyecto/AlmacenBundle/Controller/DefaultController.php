<?php

namespace Proyecto\AlmacenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AlmacenBundle:Default:index.html.twig');
    }
}
