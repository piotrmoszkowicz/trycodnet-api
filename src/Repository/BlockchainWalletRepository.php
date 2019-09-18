<?php

namespace App\Repository;

use App\Entity\BlockchainWallet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlockchainWallet|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlockchainWallet|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlockchainWallet[]    findAll()
 * @method BlockchainWallet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockchainWalletRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlockchainWallet::class);
    }

    // /**
    //  * @return BlockchainWallet[] Returns an array of BlockchainWallet objects
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
    public function findOneBySomeField($value): ?BlockchainWallet
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
