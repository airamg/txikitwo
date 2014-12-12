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
        $personalizacion->setUsuario('-');
        $personalizacion->setCaracteristicas('-');

        $formulario = $this->createForm(new PersonalizacionType(), $personalizacion);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $select = $articulo;
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $selected) {
                    $select .= '_'.$selected;
                    $buscar = "_";
                    $resultado = strpos($selected, $buscar);
                    if($resultado !== FALSE) //si la encuentra
                    {
                        if($selected == "index") {
                            $personalizacion->setCaracteristicas('-');
                            $personalizacion->setRutaFoto('articulo/'.$genero.'/'.$articulo.'.png');
                        } else {
                            $caract = explode("_", $selected);
                            $personalizacion->setCaracteristicas($caract[0].', '.$caract[1]);
                            $personalizacion->setRutaFoto('personalizacion/'.$genero.'/'.$select.'.png');
                        }
                    }
                    else //si solo es una caracteristica
                    {
                        if($selected == "index") {
                            $personalizacion->setCaracteristicas('-');
                            $personalizacion->setRutaFoto('articulo/'.$genero.'/'.$articulo.'.png');
                        } else {
                            $personalizacion->setCaracteristicas($selected);
                            $personalizacion->setRutaFoto('personalizacion/'.$genero.'/'.$select.'.png');
                        }
                    }
                }
            } else {
                $personalizacion->setRutaFoto('articulo/'.$genero.'/'.$articulo.'.png');
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
