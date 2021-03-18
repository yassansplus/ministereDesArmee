<?php

namespace App\Repository;

use App\Entity\ChatBotSay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChatBotSay|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChatBotSay|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChatBotSay[]    findAll()
 * @method ChatBotSay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChatBotSayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChatBotSay::class);
    }

    // /**
    //  * @return ChatBotSay[] Returns an array of ChatBotSay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChatBotSay
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
