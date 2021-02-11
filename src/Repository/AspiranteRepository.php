<?php

namespace App\Repository;

use App\Entity\Aspirante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aspirante|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aspirante|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aspirante[]    findAll()
 * @method Aspirante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AspiranteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aspirante::class);
    }

    // /**
    //  * @return Aspirante[] Returns an array of Aspirante objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aspirante
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
