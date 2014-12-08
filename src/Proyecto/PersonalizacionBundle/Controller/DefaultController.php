<?php

namespace Proyecto\PersonalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Proyecto\PersonalizacionBundle\Form\PersonalizacionType;
use Proyecto\PersonalizacionBundle\Entity\Personalizacion;

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
        $personalizacion->setRealizada(0);
        $personalizacion->setArticulo($articulo);

        $formulario = $this->createForm(new PersonalizacionType(), $personalizacion);
        $formulario->handleRequest($peticion);

        if ($formulario->isValid()) {

            if(!empty($_POST['check_list'])) {
                $select = $articulo;
                foreach($_POST['check_list'] as $selected) {
                    $select .= '_'.$selected;
                    $personalizacion->setRutaFoto($select.'.png');
                }
            } else {
                $personalizacion->setRutaFoto($articulo.'.png');
            }

            $em->persist($personalizacion);
            $em->flush();
            return $this->redirect($this->generateUrl('compra_homepage'));
        }

        return $this->render('PersonalizacionBundle:Default:articuloselect.html.twig', array(
            'name' => $genero,
            'names' => $articulo,
            'formulario' => $formulario->createView()
        ));
    }

}
