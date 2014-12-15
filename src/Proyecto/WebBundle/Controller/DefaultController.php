<?php

namespace Proyecto\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homepageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario->getEmail());
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }
        return $respuesta = $this->render('WebBundle:Default:homepage.html.twig', array(
            'num' => $num,
            'online' => $online
        ));
    }

    public function guiatallasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario->getEmail());
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }
        return $respuesta = $this->render('WebBundle:Default:guiatallas.html.twig', array(
            'num' => $num,
            'online' => $online
        ));
    }

    public function guiacompraAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario->getEmail());
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }
        return $respuesta = $this->render('WebBundle:Default:guiacompra.html.twig', array(
            'num' => $num,
            'online' => $online
        ));
    }

}
