<?php

namespace Proyecto\CompraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CompraBundle:Default:index.html.twig', array('name' => $name));
    }

}
