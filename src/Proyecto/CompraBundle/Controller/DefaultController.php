<?php

namespace Proyecto\CompraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\PersonalizacionBundle\Entity\Personalizacion;
use Proyecto\PersonalizacionBundle\Entity\PersonalizacionRepository;
use Proyecto\UsuarioBundle\Entity\Usuario;
use Proyecto\UsuarioBundle\Entity\UsuarioRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //CAMBIAR PARAMETRO PENDIENTE POR REALIZADA PERSONALIZACION AL ENVIAR FORM

        //buscar usuario online
        $online = 0;
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();

        //buscar las compras pendientes que tiene el usuario online
        $num = 0;
        $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario->getEmail());

        if(!$usuario) {
            $num = 0;
        } else {
            $online = 1;
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }

        return $respuesta = $this->render('CompraBundle:Default:index.html.twig', array(
            'personalizacion' => $personalizacion,
            'num' => $num,
            'online' => $online
        ));
    }

}
