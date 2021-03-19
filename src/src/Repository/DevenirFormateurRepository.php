<?php

namespace App\Repository;

use App\Entity\DevenirFormateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DevenirFormateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevenirFormateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevenirFormateur[]    findAll()
 * @method DevenirFormateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevenirFormateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevenirFormateur::class);
    }

    // /**
    //  * @return DevenirFormateur[] Returns an array of DevenirFormateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DevenirFormateur
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
