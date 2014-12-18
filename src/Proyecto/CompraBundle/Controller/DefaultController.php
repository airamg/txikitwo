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

    public function pendientesAction($personalizacionid)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            $deletedpersonalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findById($personalizacionid);
            if($deletedpersonalizacion) {
                $em->remove($deletedpersonalizacion);
                $em->flush();
                return $this->redirect($this->generateUrl('compra_homepage'));
            }
        }

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

        return $this->render('CompraBundle:Default:compraspendientes.html.twig', array(
            'id' => $personalizacionid,
            'personalizacion' => $personalizacion,
            'num' => $num,
            'online' => $online
        ));
    }

    public function pedidoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //SIN HACER
        //CAMBIAR PARAMETRO PENDIENTE POR REALIZADA PERSONALIZACION AL ENVIAR FORM
        //comprobar que el id sea distinto de 0, si es igual a 0 es que se hace el pedido de todas las compras pendientes y guardar todas las compras (hacer for)
        //si es distinto de 0: buscar la personalizacion por id para cambiar el pendiente a 0 y guardar la compra
        //buscar usuario segun el id de la personalizacion (hacer metodo en repositry) o coger el online hecho debajo

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

        return $this->render('CompraBundle:Default:pedido.html.twig', array(
            'personalizacion' => $personalizacion,
            'num' => $num,
            'online' => $online,
            'id' => $id
        ));
    }

}
