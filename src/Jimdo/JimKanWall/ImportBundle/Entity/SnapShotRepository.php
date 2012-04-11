<?php

namespace Jimdo\JimKanWall\ImportBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SnapShotRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SnapShotRepository extends EntityRepository
{
    public function getNewestSnapShotByBoardId($boardId)
    {
        $qb = $this->createQueryBuilder('s')
                   ->select('s, b')
                   ->leftJoin('s.board', 'b')
                   ->where('s.board = ?1')
                   ->addOrderBy('s.createdAt', 'DESC')
                   ->setMaxResults(1)
                   ->setParameter('1', $boardId);

        return $qb->getQuery()->getOneOrNullResult();
    }
}