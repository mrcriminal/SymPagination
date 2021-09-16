<?php

namespace App\Repository;

use App\Entity\Berichten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Berichten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Berichten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Berichten[]    findAll()
 * @method Berichten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BerichtenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Berichten::class);
    }

    // /**
    //  * @return Berichten[] Returns an array of Berichten objects
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
    public function findOneBySomeField($value): ?Berichten
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
