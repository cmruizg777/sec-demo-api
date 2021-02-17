<?php

namespace App\Repository;

use App\Entity\Asignacion;
use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Asignacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Asignacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Asignacion[]    findAll()
 * @method Asignacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsignacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Asignacion::class);
    }

    /**
     * @param $user Usuario
     * @return Asignacion[]
     */
    public function findByUser($user)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.usuario = :user')
            ->andWhere('a.inicio <= :fecha')
            ->andWhere('a.fin >= :fecha')
            ->setParameter('user', $user->getId())
            ->setParameter('fecha', new \DateTime('now'))
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Asignacion
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
