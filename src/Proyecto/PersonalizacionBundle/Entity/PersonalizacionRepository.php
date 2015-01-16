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
            WHERE p.pendiente = :pendiente AND p.mastarde = :mastarde AND p.usuario = :email
        ');
        $consulta->setParameter('pendiente', "1");
        $consulta->setParameter('mastarde', "0");
        $consulta->setParameter('email', $email);

        return $consulta->getResult();
    }

    public function findMastarde()
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT p
            FROM PersonalizacionBundle:Personalizacion p
            WHERE p.mastarde = :mastarde
        ');
        $consulta->setParameter('mastarde', "1");

        return $consulta->getResult();
    }

    public function findWithoutUser()
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT p
            FROM PersonalizacionBundle:Personalizacion p
            WHERE p.usuario = :usuario
        ');
        $consulta->setParameter('usuario', "-");

        return $consulta->getResult();
    }

    public function findById($id)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT p
            FROM PersonalizacionBundle:Personalizacion p
            WHERE p.id = :id
        ');
        $consulta->setMaxResults(1);
        $consulta->setParameter('id', $id);

        return $consulta->getOneOrNullResult();
    }

    public function findPersonalizacionesByUsuario($usuario)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT p
            FROM PersonalizacionBundle:Personalizacion p
            WHERE p.usuario = :usuario
        ');
        $consulta->setParameter('usuario', $usuario);

        return $consulta->getResult();
    }
}