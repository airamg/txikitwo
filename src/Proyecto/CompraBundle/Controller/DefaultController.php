<?php

namespace Proyecto\CompraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\PersonalizacionBundle\Entity\Personalizacion;
use Proyecto\PersonalizacionBundle\Entity\PersonalizacionRepository;
use Proyecto\UsuarioBundle\Entity\Usuario;
use Proyecto\UsuarioBundle\Entity\UsuarioRepository;
use Proyecto\CompraBundle\Entity\Compra;
use Proyecto\CompraBundle\Entity\CompraRepository;

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

    public function pedidoAction($id, $precio)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        //buscar usuario online y numero de personalizaciones pendientes
        $online = 0;
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
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
        //buscar las personalizaciones correspondientes segun el id
        $foundpersonalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findById($id);

        if ($request->isMethod('POST')) {
            if($id == "0")
            {
                //cambiar personalizaciones pendientes
                foreach ($personalizacion as $pendiente) {
                    $pendiente->setPendiente(0);
                    $em->persist($pendiente);
                    $em->flush();
                    //crear las compras correspondientes a cada personalizacion
                    $compra1 = new Compra();
                    //guardo el precio total de la compra completa y no el individual de cada personalizacion
                    $compra1->setPrecio($precio);
                    $compra1->setUsuario($pendiente->getUsuario());
                    $compra1->setPersonalizacion($pendiente);
                    $em->persist($compra1);
                    $em->flush();
                }
            }
            else
            {
                $foundpersonalizacion->setPendiente(0);
                $em->persist($foundpersonalizacion);
                $em->flush();
                //crear las compras correspondientes a cada personalizacion
                $compra2 = new Compra();
                $compra2->setPrecio($precio);
                $compra2->setUsuario($foundpersonalizacion->getUsuario());
                $compra2->setPersonalizacion($foundpersonalizacion);
                $em->persist($compra2);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('web_homepage'));
        }

        return $this->render('CompraBundle:Default:pedido.html.twig', array(
            'personalizacion' => $personalizacion,
            'num' => $num,
            'online' => $online,
            'id' => $id,
            'foundpersonalizacion' => $foundpersonalizacion,
            'precio' => $precio,
            'usuario' => $usuario
        ));
    }
}
