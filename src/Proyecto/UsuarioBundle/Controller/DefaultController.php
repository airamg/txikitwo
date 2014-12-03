<?php

namespace Proyecto\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\UsuarioBundle\Form\UsuarioRegistroType;
use Proyecto\UsuarioBundle\Entity\Usuario;

class DefaultController extends Controller
{
    public function iniciarsesionAction()
    {
        $usuario = new Usuario();
        $formulario = $this->createForm(new UsuarioRegistroType(), $usuario);

        return $this->render('UsuarioBundle:Default:iniciarsesion.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }

    public function registroAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $usuario = new Usuario();
        $usuario->setRole('user');
        $usuario->setOnline('1');
        $usuario->setRutaFoto('defaultuser.jpg');
        $usuario->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
        $usuario->setComprasRealizadas('0');
        $usuario->setComprasPendientes('0');

        $formulario = $this->createForm(new UsuarioRegistroType(), $usuario);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            /* controlar quien esta online y cambiar al anterior (falta metodo) */
            $em->persist($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('usuario_cuenta'));
        }

        return $this->render('UsuarioBundle:Default:registro.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }

    public function cuentaAction()
    {
        return $this->render('UsuarioBundle:Default:micuenta.html.twig');
    }
}
