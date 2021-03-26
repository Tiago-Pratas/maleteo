<?php

namespace App\Repository;

use App\Entity\Req;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Req|null find($id, $lockMode = null, $lockVersion = null)
 * @method Req|null findOneBy(array $criteria, array $orderBy = null)
 * @method Req[]    findAll()
 * @method Req[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReqRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Req::class);
    }

    // /**
    //  * @return Req[] Returns an array of Req objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Req
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
