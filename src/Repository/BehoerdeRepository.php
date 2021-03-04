<?php

namespace App\Repository;

use App\Entity\Behoerde;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Behoerde|null find($id, $lockMode = null, $lockVersion = null)
 * @method Behoerde|null findOneBy(array $criteria, array $orderBy = null)
 * @method Behoerde[]    findAll()
 * @method Behoerde[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BehoerdeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Behoerde::class);
    }

    // /**
    //  * @return Behoerde[] Returns an array of Behoerde objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Behoerde
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
