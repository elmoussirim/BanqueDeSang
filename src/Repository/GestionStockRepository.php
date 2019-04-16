<?php

namespace App\Repository;

use App\Entity\GestionStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GestionStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method GestionStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method GestionStock[]    findAll()
 * @method GestionStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestionStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GestionStock::class);
    }

    // /**
    //  * @return GestionStock[] Returns an array of GestionStock objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.date = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    
    public function findAllGS() 
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    
}
