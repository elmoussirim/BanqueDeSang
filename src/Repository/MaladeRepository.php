<?php

namespace App\Repository;

use App\Entity\Malade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Malade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Malade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Malade[]    findAll()
 * @method Malade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaladeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Malade::class);
    }

   

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andwhere('m.malade LIKE :val OR m.numero_cin = :valeur')
           
            ->setParameter('val','%'.$value.'%')
			->setParameter('valeur',$value)
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
/*
    
    public function findOneBySomeField($value): ?Malade
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
 */   
}
