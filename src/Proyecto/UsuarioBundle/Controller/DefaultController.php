<?php

namespace Proyecto\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\UsuarioBundle\Form\UsuarioRegistroType;
use Proyecto\UsuarioBundle\Entity\Usuario;

class DefaultController extends Controller
{
    public function iniciarsesionAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $formulario = $this->createFormBuilder()
            ->add('email', 'email', array('attr' => array('placeholder' => 'Email')))
            ->add('password', 'password', array('attr' => array('placeholder' => 'Contraseña')))
            ->getForm();
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $email = $formulario->get('email')->getData();
            $pass = $formulario->get('password')->getData();

            //comprobar que existe el email del usuario
            $user1 = $em->getRepository('UsuarioBundle:Usuario')->findUserByEmail($email);
            if(!$user1) {
                return $this->redirect($this->generateUrl('usuario_iniciarsesion_error'));
            } else {
                //comprobar que la contraseña corresponde al email introducido
                if($pass != $user1->getPassword()) {
                    return $this->redirect($this->generateUrl('usuario_iniciarsesion_error'));
                } else {
                    $setpersonalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findWithoutUser();
                    if($setpersonalizacion) {
                        foreach($setpersonalizacion as $set) {
                            $set->setUsuario($formulario->get('email')->getData());
                            $em->persist($set);
                            $em->flush();
                        }
                    }
                    $user1->setOnline('1');
                    $em->persist($user1);
                    $em->flush();
                    return $this->redirect($this->generateUrl('usuario_cuenta'));
                }
            }
        }

        $usuario1 = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario1) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario1->getEmail());
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }

        return $this->render('UsuarioBundle:Default:iniciarsesion.html.twig', array(
            'formulario' => $formulario->createView(),
            'num' => $num,
            'online' => $online
        ));
    }

    public function iniciarsesionerrorAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $formulario = $this->createFormBuilder()
            ->add('email', 'email', array('attr' => array('placeholder' => 'Email')))
            ->add('password', 'password', array('attr' => array('placeholder' => 'Contraseña')))
            ->getForm();
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $email = $formulario->get('email')->getData();
            $pass = $formulario->get('password')->getData();

            //comprobar que existe el email del usuario
            $user1 = $em->getRepository('UsuarioBundle:Usuario')->findUserByEmail($email);
            if(!$user1) {
                return $this->redirect($this->generateUrl('usuario_iniciarsesion_error'));
            } else {
                //comprobar que la contraseña corresponde al email introducido
                if($pass != $user1->getPassword()) {
                    return $this->redirect($this->generateUrl('usuario_iniciarsesion_error'));
                } else {
                    $setpersonalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findWithoutUser();
                    if($setpersonalizacion) {
                        foreach($setpersonalizacion as $set) {
                            $set->setUsuario($formulario->get('email')->getData());
                            $em->persist($set);
                            $em->flush();
                        }
                    }
                    $user1->setOnline('1');
                    $em->persist($user1);
                    $em->flush();
                    return $this->redirect($this->generateUrl('usuario_cuenta'));
                }
            }
        }

        $usuario1 = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario1) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario1->getEmail());
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }

        return $this->render('UsuarioBundle:Default:iniciarsesionerror.html.twig', array(
            'formulario' => $formulario->createView(),
            'num' => $num,
            'online' => $online
        ));
    }

    public function registrarseAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $usuario = new Usuario();
        $formulario = $this->createForm(new UsuarioRegistroType(), $usuario);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            $setpersonalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findWithoutUser();
            if($setpersonalizacion) {
                foreach($setpersonalizacion as $set) {
                    $set->setUsuario($formulario->get('email')->getData());
                    $em->persist($set);
                    $em->flush();
                }
            }

            $em->persist($usuario);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_cuenta'));
        }

        $usuario1 = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
        $num = 0;
        $online = 0;
        if(!$usuario1) {
            $num = 0;
        } else {
            $online = 1;
            $personalizacion = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPendientesByEmailUsuario($usuario1->getEmail());
            foreach ($personalizacion as $pendiente) {
                $num = $num + 1;
            }
        }

        return $this->render('UsuarioBundle:Default:registro.html.twig', array(
            'formulario' => $formulario->createView(),
            'num' => $num,
            'online' => $online
        ));
    }

    public function cuentaAction()
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

        return $respuesta = $this->render('UsuarioBundle:Default:micuenta.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario
        ));
    }

    public function passwordAction()
    {
        $peticion = $this->getRequest();
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

        $formulario = $this->createFormBuilder()
            ->add('passwordactual', 'password', array('attr' => array('placeholder' => 'Contraseña actual')))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'first_options'   => array('label' => false, 'attr' => array('placeholder' => 'Nueva contraseña')),
                'second_options'  => array('label' => false, 'attr' => array('placeholder' => 'Repite la nueva contraseña')),
                'required'        => false
            ))
            ->getForm();
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $passactual = $formulario->get('passwordactual')->getData();
            $pass = $formulario->get('password')->getData();
            if($passactual == $usuario->getPassword())
            {
                $usuario->setPassword($pass);
                $em->persist($usuario);
                $em->flush();
                return $this->redirect($this->generateUrl('usuario_cuenta'));
            }
        }

        return $respuesta = $this->render('UsuarioBundle:Default:cuentapassword.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario,
            'formulario' => $formulario->createView()
        ));
    }

    public function direccionAction()
    {
        $peticion = $this->getRequest();
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

        $formulario = $this->createFormBuilder()
            ->add('direccion', 'textarea', array('attr' => array('placeholder' => 'Nueva dirección')))
            ->add('codigoPostal', 'text', array('attr' => array('placeholder' => 'Nuevo código postal')))
            ->getForm();
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            $direccion = $formulario->get('direccion')->getData();
            $codigoPostal = $formulario->get('codigoPostal')->getData();
            $usuario->setDireccion($direccion);
            $usuario->setCodigoPostal($codigoPostal);
            $em->persist($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('usuario_cuenta'));
        }

        return $respuesta = $this->render('UsuarioBundle:Default:cuentadireccion.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario,
            'formulario' => $formulario->createView()
        ));
    }

    public function borrarcuentaAction()
    {
        $request = $this->getRequest();
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

        if ($request->isMethod('POST')) {
            $em->remove($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('web_homepage'));
        }

        return $respuesta = $this->render('UsuarioBundle:Default:borrarcuenta.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario
        ));
    }

    public function pedidosAction()
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

        $personalizacion1 = $em->getRepository('PersonalizacionBundle:Personalizacion')->findPersonalizacionesByUsuario($usuario->getEmail());

        return $respuesta = $this->render('UsuarioBundle:Default:listadopedidos.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario,
            'personalizacion' => $personalizacion1
        ));
    }

    public function pedidosrealizadosAction()
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

        $compra = $em->getRepository('CompraBundle:Compra')->findComprasByUsuario($usuario->getEmail());

        return $respuesta = $this->render('UsuarioBundle:Default:pedidosrealizados.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario,
            'compra' => $compra
        ));
    }

    public function facturasAction()
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

        $compra = $em->getRepository('CompraBundle:Compra')->findComprasByUsuario($usuario->getEmail());

        //FALTA hacer que se pueda descargar en pdf la factura
        //comprobar que en un misma factura salgan todos los que tenga el mismo numero de pedido o los de igual preciototal

        return $respuesta = $this->render('UsuarioBundle:Default:facturas.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario,
            'compra' => $compra
        ));
    }

    public function cerrarsesionAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            $usuario = $em->getRepository('UsuarioBundle:Usuario')->findUserOnline();
            if($usuario) {
                $usuario->setOnline('0');
                $em->persist($usuario);
                $em->flush();
                return $this->redirect($this->generateUrl('web_homepage'));
            }
        }

        return $this->render('UsuarioBundle:Default:cerrarsesion.html.twig');
    }
}
