<?php

namespace App\Repository;

use App\Entity\DayRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DayRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method DayRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method DayRecord[]    findAll()
 * @method DayRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DayRecordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DayRecord::class);
    }

    // /**
    //  * @return DayRecord[] Returns an array of DayRecord objects
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
    public function findOneBySomeField($value): ?DayRecord
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
