<?php

namespace Proyecto\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{

    public function findUserOnline()
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT u
            FROM UsuarioBundle:Usuario u
            WHERE u.online = :param
        ');
        $consulta->setMaxResults(1);
        $consulta->setParameter('param', "1");

        return $consulta->getOneOrNullResult();
    }

    public function findUserByEmail($email)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT u
            FROM UsuarioBundle:Usuario u
            WHERE u.email = :param
        ');
        $consulta->setMaxResults(1);
        $consulta->setParameter('param', $email);

        return $consulta->getOneOrNullResult();
    }

}