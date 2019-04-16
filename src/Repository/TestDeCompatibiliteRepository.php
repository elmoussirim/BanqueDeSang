<?php

namespace App\Repository;

use App\Entity\TestDeCompatibilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestDeCompatibilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestDeCompatibilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestDeCompatibilite[]    findAll()
 * @method TestDeCompatibilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestDeCompatibiliteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestDeCompatibilite::class);
    }

    // /**
    //  * @return TestDeCompatibilite[] Returns an array of TestDeCompatibilite objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.poche = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?TestDeCompatibilite
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
