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

    public function findAllArticulosByNombre($nombrearticulo)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT a
            FROM ArticuloBundle:Articulo a
            WHERE a.nombre = :nombreArtic
        ');
        $consulta->setParameter('nombreArtic', $nombrearticulo);

        return $consulta->getResult();
    }

    public function findAllArticulosByColor($colorarticulo)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT a
            FROM ArticuloBundle:Articulo a
            WHERE a.color = :colorArtic
        ');
        $consulta->setParameter('colorArtic', $colorarticulo);

        return $consulta->getResult();
    }

    public function findAllArticulosByEstampado($estampadoarticulo)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT a
            FROM ArticuloBundle:Articulo a
            WHERE a.estampado = :estampadoArtic
        ');
        $consulta->setParameter('estampadoArtic', $estampadoarticulo);

        return $consulta->getResult();
    }

    public function findAllArticulosByTejido($tejidoarticulo)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT a
            FROM ArticuloBundle:Articulo a
            WHERE a.tejido = :$tejidoArtic
        ');
        $consulta->setParameter('tejidoArtic', $tejidoarticulo);

        return $consulta->getResult();
    }
}