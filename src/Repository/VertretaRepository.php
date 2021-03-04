<?php

namespace App\Repository;

use App\Entity\Vertreta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vertreta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vertreta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vertreta[]    findAll()
 * @method Vertreta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VertretaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vertreta::class);
    }

    // /**
    //  * @return Vertreta[] Returns an array of Vertreta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vertreta
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
