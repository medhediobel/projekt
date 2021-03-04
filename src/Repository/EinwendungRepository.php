<?php

namespace App\Repository;

use App\Entity\Einwendung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Einwendung|null find($id, $lockMode = null, $lockVersion = null)
 * @method Einwendung|null findOneBy(array $criteria, array $orderBy = null)
 * @method Einwendung[]    findAll()
 * @method Einwendung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EinwendungRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Einwendung::class);
    }

    // /**
    //  * @return Einwendung[] Returns an array of Einwendung objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Einwendung
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
