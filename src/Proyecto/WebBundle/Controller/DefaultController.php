<?php

namespace Proyecto\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homepageAction()
    {
        return $this->render('WebBundle:Default:homepage.html.twig');
    }

    public function guiatallasAction()
    {
        return $this->render('WebBundle:Default:guiatallas.html.twig');
    }

    public function guiacompraAction()
    {
        return $this->render('WebBundle:Default:guiacompra.html.twig');
    }

}
