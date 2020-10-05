<?php

namespace App\Repository;

use App\Entity\Sheet;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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

    public function userCountSheets(User $user): QueryBuilder
    {
        return $this->createQueryBuilder('s')
            ->select('COUNT(s.id) as value')
            ->where('s.author =' . $user);
    }
}
