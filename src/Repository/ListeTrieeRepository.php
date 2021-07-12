<?php

namespace App\Repository;

use App\Entity\ListeTriee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeTriee|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeTriee|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeTriee[]    findAll()
 * @method ListeTriee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeTrieeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeTriee::class);
    }

    // /**
    //  * @return ListeTriee[] Returns an array of ListeTriee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeTriee
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
