<?php

namespace App\Repository;

use App\Entity\Sheet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sheet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sheet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sheet[]    findAll()
 * @method Sheet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sheet::class);
    }

    // /**
    //  * @return Sheet[] Returns an array of Sheet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sheet
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
