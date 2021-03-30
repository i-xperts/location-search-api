<?php

namespace App\Repository;

use App\Entity\PoliticalFunction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PoliticalFunction|null find($id, $lockMode = null, $lockVersion = null)
 * @method PoliticalFunction|null findOneBy(array $criteria, array $orderBy = null)
 * @method PoliticalFunction[]    findAll()
 * @method PoliticalFunction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoliticalFunctionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PoliticalFunction::class);
    }

    // /**
    //  * @return PoliticalFunction[] Returns an array of PoliticalFunction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PoliticalFunction
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
