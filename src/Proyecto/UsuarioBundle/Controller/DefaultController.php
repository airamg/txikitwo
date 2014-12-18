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

        $errormessage_email = '-';
        $errormessage_pass = '-';

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
                $errormessage_email = 'el email no existe';
                return $this->redirect($this->generateUrl('usuario_iniciarsesion'));
            } else {
                //comprobar que la contraseña corresponde al email introducido
                if($pass != $user1->getPassword()) {
                    $errormessage_pass = 'email o contraseña no válidos';
                    return $this->redirect($this->generateUrl('usuario_iniciarsesion'));
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
            'online' => $online,
            'erroremail' => $errormessage_email,
            'errorpass' => $errormessage_pass
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

        //HACER

        return $respuesta = $this->render('UsuarioBundle:Default:micuenta.html.twig', array(
            'num' => $num,
            'online' => $online,
            'usuario' => $usuario
        ));
    }

    public function cerrarsesionAction()
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

        //FALTA DE HACER: cambiar el parametro online de la bd de ese usuario de 1 a 0
        //redirigir a pagina inicial

        return $respuesta = $this->render('UsuarioBundle:Default:cerrarsesion.html.twig', array(
            'num' => $num,
            'online' => $online
        ));
    }
}
