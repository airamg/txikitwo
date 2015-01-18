<?php

namespace Proyecto\PersonalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\PersonalizacionBundle\Form\PersonalizacionType;
use Proyecto\PersonalizacionBundle\Entity\Personalizacion;
use Proyecto\UsuarioBundle\Entity\Usuario;
use Proyecto\UsuarioBundle\Entity\UsuarioRepository;
use Proyecto\PersonalizacionBundle\Entity\Articulo;
use Proyecto\PersonalizacionBundle\Entity\ArticuloRepository;

class DefaultController extends Controller
{
    public function indexAction($genero)
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

        return $this->render('PersonalizacionBundle:Default:personalizacion.html.twig', array(
            'name' => $genero,
            'num' => $num,
            'online' => $online
        ));
    }

    public function articuloselectAction($genero, $articulo)
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $usuario1 = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario1) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion1 = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario1->getEmail());
            foreach ($personalizacion1 as $pendiente) {
                $num = $num + 1;
            }
        }

        $personalizacion = new Personalizacion();
        $personalizacion->setPendiente(1);
        $personalizacion->setMastarde(0);
        $personalizacion->setGenero($genero);
        //buscar articulo por nombre y genero
        $articulo1 = $em->getRepository('ArticuloBundle:Articulo')->findBySlugAndGenero($articulo, $genero);
        $personalizacion->setArticulo($articulo1);
        $personalizacion->setPrecioAccesorios(0.00);
        $personalizacion->setUsuario('-');
        $personalizacion->setCaracteristicas('-');

        $formulario = $this->createForm(new PersonalizacionType(), $personalizacion);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $select = $articulo;
            $precio = 0;
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
                            if($caract[0] == "larguras") {
                                $personalizacion->setCaracteristicas('corto, '.$caract[1]);
                            } elseif($caract[0] == "nombres") {
                                $nombre = $formulario->get('nombre')->getData();
                                $personalizacion->setCaracteristicas('nombre (' .$nombre.'), '.$caract[1]);
                            } elseif($caract[1] == "nombres") {
                                $nombre = $formulario->get('nombre')->getData();
                                $personalizacion->setCaracteristicas($caract[0].', nombre ('.$nombre.')');
                            } else {
                                $personalizacion->setCaracteristicas($caract[0].', '.$caract[1]);
                            }
                            //calcular precio de los accesorios seleccionados
                            if(($caract[0] == "bolsillos") && ($caract[1] == "mangas")) {
                                $precio = 2.50 + 0.20;
                            } elseif (($caract[0] == "mangas") && ($caract[1] == "lazos")) {
                                $precio = 0.20 + 2.00;
                            } elseif (($caract[0] == "bolsillos") && ($caract[1] == "nombres")) {
                                $precio = 2.50 + 1.10;
                            } elseif ($caract[0] == "lazos") {
                                $precio = 2.00;
                            } elseif ($caract[0] == "bolsillos") {
                                $precio = 2.50;
                            } elseif ($caract[0] == "mangas") {
                                $precio = 0.20;
                            } elseif ($caract[0] == "nombres") {
                                $precio = 1.10;
                            } else {
                                $precio = 0.00;
                            }
                            $personalizacion->setRutaFoto('personalizacion/'.$genero.'/'.$select.'.png');
                        }
                        $personalizacion->setPrecioAccesorios($precio);
                    }
                    else //si solo es una caracteristica
                    {
                        if($selected == "index") {
                            $personalizacion->setCaracteristicas('-');
                            $personalizacion->setRutaFoto('articulo/'.$genero.'/'.$articulo.'.png');
                        } else {
                            if($selected == "larguras") {
                                $personalizacion->setCaracteristicas('corto');
                            } elseif($selected == "nombres") {
                                $nombre = $formulario->get('nombre')->getData();
                                $personalizacion->setCaracteristicas('nombre (' .$nombre.')');
                            } else {
                                $personalizacion->setCaracteristicas($selected);
                            }
                            //calcular precio de los accesorios seleccionados
                            if($selected == "bolsillos") {
                                $precio = 2.50;
                            } elseif ($selected == "botones") {
                                $precio = 1.30;
                            } elseif (($selected == "larguras") || ($selected == "mangas")) {
                                $precio = 0.20;
                            } elseif ($selected == "lazos") {
                                $precio = 2.00;
                            } elseif ($selected == "dibujos") {
                                $precio = 0.50;
                            } elseif ($selected == "nombres") {
                                $precio = 1.10;
                            } else {
                                $precio = 0.00;
                            }
                            $personalizacion->setRutaFoto('personalizacion/'.$genero.'/'.$select.'.png');
                        }
                        $personalizacion->setPrecioAccesorios($precio);
                    }
                }
            } else {
                $personalizacion->setRutaFoto('articulo/'.$genero.'/'.$articulo.'.png');
            }
            //comprobar que usuario ha iniciado sesion
            $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
            if(!$usuario) {
                //si encuentra alguna personalizacion sin usuario, borrarla antes de crear la actual
                $deletedpersonalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findWithoutUser();
                foreach($deletedpersonalizacion as $deleted) {
                    $em->remove($deleted);
                    $em->flush();
                }
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
            'formulario' => $formulario->createView(),
            'num' => $num,
            'online' => $online
        ));
    }

}
