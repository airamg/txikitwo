<?php

namespace Proyecto\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function iniciarsesionAction()
    {
        return $this->render('UsuarioBundle:Default:iniciarsesion.html.twig');
    }

    public function registroAction()
    {
        return $this->render('UsuarioBundle:Default:registro.html.twig');
    }
}
