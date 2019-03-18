<?php

namespace App\Repository;

use App\Entity\PocheReservee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PocheReservee|null find($id, $lockMode = null, $lockVersion = null)
 * @method PocheReservee|null findOneBy(array $criteria, array $orderBy = null)
 * @method PocheReservee[]    findAll()
 * @method PocheReservee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PocheReserveeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PocheReservee::class);
    }

    // /**
    //  * @return PocheReservee[] Returns an array of PocheReservee objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.demande = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?PocheReservee
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
