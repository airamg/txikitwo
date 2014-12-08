<?php

namespace Proyecto\PersonalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonalizacionRepository extends EntityRepository
{
    public function findPendientesByEmailUsuario($email)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT p
            FROM PersonalizacionBundle:Personalizacion p
            WHERE p.pendiente = :pendiente AND p.usuario = :email
        ');
        $consulta->setParameter('pendiente', "1");
        $consulta->setParameter('email', $email);

        return $consulta->getResult();
    }
}