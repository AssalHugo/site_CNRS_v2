<?php

namespace App\Repository;

use App\Entity\Contrats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contrats>
 *
 * @method Contrats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contrats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contrats[]    findAll()
 * @method Contrats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contrats::class);
    }

    public function findLastContrat($idEmploye) : Contrats{


        $sql = '
            SELECT * FROM Contrats c
            WhERE employe_id = :id
            ORDER BY c.date_debut DESC
            LIMIT 1
            ';

        return $this->executeQuery($sql, ['id' => $idEmploye])[0];
    }

    //    /**
    //     * @return Contrats[] Returns an array of Contrats objects
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

    //    public function findOneBySomeField($value): ?Contrats
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
