<?php

namespace Proyecto\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioRegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array('attr' => array('placeholder' => 'Nombre')))
            ->add('apellido1', 'text', array('attr' => array('placeholder' => 'Primer apellido')))
            ->add('apellido2', 'text', array('attr' => array('placeholder' => 'Segundo apellido')))
            ->add('email', 'email', array('attr' => array('placeholder' => 'Email')))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'first_options'   => array('label' => false, 'attr' => array('placeholder' => 'Contraseña')),
                'second_options'  => array('label' => false, 'attr' => array('placeholder' => 'Repite contraseña')),
                'required'        => false
            ))
            ->add('direccion', 'textarea', array('attr' => array('placeholder' => 'Dirección')))
            ->add('codigoPostal', 'text', array('attr' => array('placeholder' => 'Código postal')))
        ;
    }

    public function getName()
    {
        return 'registro_form_usuario';
    }
}
