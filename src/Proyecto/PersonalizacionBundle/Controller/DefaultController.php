<?php

namespace Proyecto\PersonalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\PersonalizacionBundle\Form\PersonalizacionType;
use Proyecto\PersonalizacionBundle\Entity\Personalizacion;
use Proyecto\UsuarioBundle\Entity\Usuario;
use Proyecto\UsuarioBundle\Entity\UsuarioRepository;

class DefaultController extends Controller
{
    public function indexAction($genero)
    {
        return $this->render('PersonalizacionBundle:Default:personalizacion.html.twig', array('name' => $genero));
    }

    public function articuloselectAction($genero, $articulo)
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $personalizacion = new Personalizacion();
        $personalizacion->setPendiente(1);
        $personalizacion->setArticulo($articulo);
        $personalizacion->setGenero($genero);
        $personalizacion->setColor('-');
        $personalizacion->setUsuario('-');
        $personalizacion->setAccesorios('-');

        $formulario = $this->createForm(new PersonalizacionType(), $personalizacion);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $select = $articulo;
            $acces = '';
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $selected) {
                    $select .= '_'.$selected;
                    $acces .= $selected.' ';
                    if(($selected == "color1") || ($selected == "color2")) /* INCLUIR TODOS LOS COLORES */{
                        $personalizacion->setColor($selected);
                        $personalizacion->setAccesorios($acces);
                        $personalizacion->setRutaFoto('personalizacion/'.$genero.'/'.$select.'.png');
                    } else {
                        $personalizacion->setAccesorios($acces);
                        $personalizacion->setRutaFoto('personalizacion/'.$genero.'/'.$select.'.png');
                    }
                }
            } else {
                $personalizacion->setRutaFoto('articulo/'.$genero.'/'.$select.'.png');
            }

            //comprobar que usuario ha iniciado sesion
            $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
            if(!$usuario) {
                $em->persist($personalizacion);
                $em->flush();
                return $this->redirect($this->generateUrl('usuario_iniciarsesion'));
            } else {
                $personalizacion->setUsuario($usuario->getEmail());
                $em->persist($personalizacion);
                $em->flush();
                return $this->redirect($this->generateUrl('compra_homepage'));
            }
        }

        return $this->render('PersonalizacionBundle:Default:articuloselect.html.twig', array(
            'name' => $genero,
            'names' => $articulo,
            'formulario' => $formulario->createView()
        ));
    }

}
