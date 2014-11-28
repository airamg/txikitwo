<?php

namespace Proyecto\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{

    public function findUsuarioOnline()
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('
            SELECT u
            FROM UsuarioBundle:Usuario u
            WHERE u.online = "1"
        ');
        $consulta->setMaxResults(1);

        return $consulta->getOneOrNullResult();
    }

    public function findUsuarioByEmail($email)
    {
        return $this->repository->findOneBy(array('email' => $email));
    }

    public function findListaUsuarios()
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT u
            FROM UsuarioBundle:Usuario u
        ');
        $consulta->useResultCache(true, 3600);

        return $consulta->getArrayResult();
    }
}