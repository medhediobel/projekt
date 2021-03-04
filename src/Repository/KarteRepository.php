<?php

namespace App\Repository;

use App\Entity\Karte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Karte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Karte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Karte[]    findAll()
 * @method Karte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KarteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Karte::class);
    }

    // /**
    //  * @return Karte[] Returns an array of Karte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Karte
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
