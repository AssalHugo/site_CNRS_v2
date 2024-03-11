<?php

namespace App\Repository;

use App\Entity\CompteInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompteInfo>
 *
 * @method CompteInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteInfo[]    findAll()
 * @method CompteInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteInfo::class);
    }

    //    /**
    //     * @return CompteInfo[] Returns an array of CompteInfo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CompteInfo
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
