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
            ->add('apellidos', 'text', array('attr' => array('placeholder' => 'Primer apellido')))
            ->add('apellidos', 'text', array('attr' => array('placeholder' => 'Segundo apellido')))
            ->add('email', 'email', array('attr' => array('placeholder' => 'Email')))
            ->add('password', 'password', array('attr' => array('placeholder' => 'Contraseña')))
            ->add('password', 'password', array('attr' => array('placeholder' => 'Repite la contraseña')))
        ;
    }

    public function getName()
    {
        return 'registro_form_usuario';
    }
}
