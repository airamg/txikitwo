<?php

namespace Proyecto\PersonalizacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class PersonalizacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('talla', 'entity', array(
                'class'         => 'Proyecto\\ArticuloBundle\\Entity\\Talla',
                'empty_value'   => 'Selecciona una talla',
                'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio->createQueryBuilder('c');
                    },
            ))
            ->add('tejido', 'entity', array(
                'class'         => 'Proyecto\\ArticuloBundle\\Entity\\Tejido',
                'empty_value'   => 'Selecciona un tejido',
                'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio->createQueryBuilder('c')
                            ->orderBy('c.nombre', 'ASC');
                    },
            ))
            ->add('nombre', 'text', array('attr' => array('value' => 'tu nombre')))
        ;
    }

    public function getName()
    {
        return 'personalizacion_form';
    }
}
