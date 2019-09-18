<?php

namespace App\Repository;

use App\Entity\BlockchainTransaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlockchainTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlockchainTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlockchainTransaction[]    findAll()
 * @method BlockchainTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockchainTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlockchainTransaction::class);
    }

    // /**
    //  * @return BlockchainTransaction[] Returns an array of BlockchainTransaction objects
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
    public function findOneBySomeField($value): ?BlockchainTransaction
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
