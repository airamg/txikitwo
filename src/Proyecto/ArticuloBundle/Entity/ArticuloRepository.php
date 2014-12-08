<?php

namespace Proyecto\ArticuloBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ArticuloRepository extends EntityRepository
{
    public function findBySlugAndGenero($articulo, $genero)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT a
            FROM ArticuloBundle:Articulo a
            WHERE a.slug = :articulo AND a.genero = :genero
        ');
        $consulta->setMaxResults(1);
        $consulta->setParameter('articulo', $articulo);
        $consulta->setParameter('genero', $genero);

        return $consulta->getOneOrNullResult();

    }
}