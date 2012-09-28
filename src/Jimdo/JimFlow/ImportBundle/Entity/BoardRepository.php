<?php

namespace Jimdo\JimFlow\ImportBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BoardRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BoardRepository extends EntityRepository
{
    public function findAllOrdered()
    {
        $qb = $this->createQueryBuilder('b')
                   ->select('b')
                   ->addOrderBy('b.name', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function getBoardByIdWithOrderedColumns($boardId)
    {
        $qb = $this->createQueryBuilder('b')
                   ->select('b, bc')
                   ->leftJoin('b.boardColumns', 'bc')
                   ->where('b.id = ?1')
                   ->addOrderBy('bc.ordering', 'ASC')
                   ->setParameter('1', $boardId);

        return $qb->getQuery()->getOneOrNullResult();        
    }

}