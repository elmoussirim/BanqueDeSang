<?php

namespace App\Repository;
use App\Entity\Serologie;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Serologie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serologie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serologie[]    findAll()
 * @method Serologie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerologieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Serologie::class);
    }
    public function ModifierStatut($val,$val2)
    {

        $entityManager = $this->getEntityManager();

       
        $query = $entityManager->createQuery('UPDATE App\Entity\Serologie s SET s.statut = :val2 WHERE s.id = :val')
            ->setParameter('val', $val)
            ->setParameter('val2', $val2)
        ;
        $query->execute();
    ;
    }
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andwhere('s.CinDonneur = :val OR s.N_ordre = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField($value): ?Serologie
    {
        return $this->createQueryBuilder('s')
            ->andwhere('s.N_ordre = :val AND s.A_utiliser_avant IS NOT NULL')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}