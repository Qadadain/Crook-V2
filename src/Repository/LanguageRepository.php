<?php

namespace App\Repository;

use App\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Language|null find($id, $lockMode = null, $lockVersion = null)
 * @method Language|null findOneBy(array $criteria, array $orderBy = null)
 * @method Language[]    findAll()
 * @method Language[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Language::class);
    }

   public function sheetByLanguage()
   {
       return $this->createQueryBuilder('l')
           ->select('l.image', 'l.name')
           ->innerJoin('l.sheets', 's')
           ->addSelect('s.title')
           ->addSelect('s.description')
           ->addSelect('s.content')
           ->addSelect('s.author')
           ->where('l.id = :s.language.id')
           ->getQuery();
   }
}
