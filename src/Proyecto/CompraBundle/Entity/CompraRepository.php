<?php

namespace Proyecto\CompraBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CompraRepository extends EntityRepository
{
    public function findComprasByUsuario($usuario)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT c
            FROM CompraBundle:Compra c
            WHERE c.usuario = :usuario
        ');
        $consulta->setParameter('usuario', $usuario);

        return $consulta->getResult();
    }

    public function findComprasByNumPedido($numpedido)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT c
            FROM CompraBundle:Compra c
            WHERE c.numeroPedido = :numeroPedido
        ');
        $consulta->setParameter('numeroPedido', $numpedido);

        return $consulta->getResult();
    }
}