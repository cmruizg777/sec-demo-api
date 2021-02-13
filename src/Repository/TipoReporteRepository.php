<?php

namespace App\Repository;

use App\Entity\TipoReporte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoReporte|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoReporte|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoReporte[]    findAll()
 * @method TipoReporte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoReporteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoReporte::class);
    }

    // /**
    //  * @return TipoReporte[] Returns an array of TipoReporte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoReporte
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
