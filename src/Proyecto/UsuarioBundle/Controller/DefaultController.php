<?php

namespace Proyecto\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\UsuarioBundle\Form\UsuarioRegistroType;
use Proyecto\UsuarioBundle\Entity\Usuario;

class DefaultController extends Controller
{
    public function iniciarsesionAction()
    {
        return $this->render('UsuarioBundle:Default:iniciarsesion.html.twig');
    }

    public function registroAction()
    {
        $usuario = new Usuario();
        $formulario = $this->createForm(new UsuarioRegistroType(), $usuario);

        return $this->render('UsuarioBundle:Default:registro.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }

    public function cuentaAction()
    {
        return $this->render('UsuarioBundle:Default:micuenta.html.twig');
    }
}
