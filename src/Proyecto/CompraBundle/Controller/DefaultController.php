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

        //visualizar personalizacion pendientes de cada usuario (buscar en personalizacion por usuario igual a online y pendiente 1)
        // - si hay mas de una hacer otra pagina con todas para seleccionar (poner precio al lado)
        // - si hay una ir directamente a pagina compra con precio calculado

        //CAMBIAR PARAMETRO PENDIENTE POR REALIZADA PERSONALIZACION AL ENVIAR FORM

        //buscar usuario online
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();

        //buscar las compras pendientes que tiene el usuario online
        $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario->getEmail());

        return $respuesta = $this->render('CompraBundle:Default:index.html.twig', array(
            'personalizacion' => $personalizacion
        ));
    }

}
