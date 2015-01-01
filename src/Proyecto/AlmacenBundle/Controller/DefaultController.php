<?php

namespace Proyecto\AlmacenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $formulario = $this->createFormBuilder()
            ->add('busqueda', 'text', array('attr' => array('placeholder' => 'Encuentra tu artículo')))
            ->getForm();
        $formulario->handleRequest($peticion);

        //buscar todos los articulos
        $articulos = $em->getRepository('ArticuloBundle:Articulo')->findAll();

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
        return $respuesta = $this->render('AlmacenBundle:Default:index.html.twig', array(
            'num' => $num,
            'online' => $online,
            'formulario' => $formulario->createView(),
            'articulos' => $articulos
        ));
    }

    public function coloresAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $formulario = $this->createFormBuilder()
            ->add('busqueda', 'text', array('attr' => array('placeholder' => 'Encuentra tu color')))
            ->getForm();
        $formulario->handleRequest($peticion);

        //buscar todos los colores
        $colores = $em->getRepository('ArticuloBundle:Color')->findAll();

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
        return $respuesta = $this->render('AlmacenBundle:Default:colores.html.twig', array(
            'num' => $num,
            'online' => $online,
            'formulario' => $formulario->createView(),
            'colores' => $colores
        ));
    }

    public function estampadosAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $formulario = $this->createFormBuilder()
            ->add('busqueda', 'text', array('attr' => array('placeholder' => 'Encuentra tu estampado')))
            ->getForm();
        $formulario->handleRequest($peticion);

        //buscar todos los estampados
        $estampados = $em->getRepository('ArticuloBundle:Estampado')->findAll();

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
        return $respuesta = $this->render('AlmacenBundle:Default:estampados.html.twig', array(
            'num' => $num,
            'online' => $online,
            'formulario' => $formulario->createView(),
            'estampados' => $estampados
        ));
    }

    public function tejidosAction()
    {
        $em = $this->getDoctrine()->getManager();

        //buscar todos los tejidos
        $tejidos = $em->getRepository('ArticuloBundle:Tejido')->findAll();

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
        return $respuesta = $this->render('AlmacenBundle:Default:tejidos.html.twig', array(
            'num' => $num,
            'online' => $online,
            'tejidos' => $tejidos
        ));
    }

    public function busquedaAction($parametro)
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if($parametro == "articulo") {
            $placeholder = 'Encuentra tu artículo';
        } elseif($parametro == "color") {
            $placeholder = 'Encuentra tu color';
        } elseif($parametro == "estampado") {
            $placeholder = 'Encuentra tu estampado';
        } else {
            $placeholder = 'Introduce parámetros de búsqueda';
        }

        $busqueda = ' ';

        $formulario = $this->createFormBuilder()
            ->add('busqueda', 'text', array('attr' => array('placeholder' => $placeholder)))
            ->getForm();
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $parambusqueda = $formulario->get('busqueda')->getData();
            if($parametro == "articulo") {
                $busqueda = $em->getRepository('ArticuloBundle:Articulo')->findAllArticulosByNombre($parambusqueda);
            }
            elseif($parametro == "color") {
                $busqueda = $em->getRepository('ArticuloBundle:Articulo')->findAllArticulosByColor($parambusqueda);
            }
            elseif($parametro == "estampado") {
                $busqueda = $em->getRepository('ArticuloBundle:Articulo')->findAllArticulosByEstampado($parambusqueda);
            }
            else {
                return $this->redirect($this->generateUrl('almacen_busqueda_error'));
            }
        }

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
        return $respuesta = $this->render('AlmacenBundle:Default:busqueda.html.twig', array(
            'num' => $num,
            'online' => $online,
            'formulario' => $formulario->createView(),
            'busqueda' => $busqueda,
            'parametro' => $parametro
        ));
    }

    public function busquedaerrorAction()
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
        return $respuesta = $this->render('AlmacenBundle:Default:busquedaerror.html.twig', array(
            'num' => $num,
            'online' => $online
        ));
    }

}