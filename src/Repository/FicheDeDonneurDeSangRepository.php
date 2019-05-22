<?php

namespace App\Repository;
use App\Entity\FicheDeDonneurDeSang;

use App\Entity\Donneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FicheDeDonneurDeSang|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheDeDonneurDeSang|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheDeDonneurDeSang[]    findAll()
 * @method FicheDeDonneurDeSang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheDeDonneurDeSangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FicheDeDonneurDeSang::class);
    }
    public function findByExampleField($value): ?FicheDeDonneurDeSang
    {

        return $this->createQueryBuilder('f')
            ->andWhere('f.N_ordre = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOne($value): ?FicheDeDonneurDeSang
    {

        return $this->createQueryBuilder('f')
            ->andWhere('f.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findBySomeField($value)
    {
            return $this->createQueryBuilder('f')
            ->andWhere('f.num_donneur = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }
    public function modifier($val,$val2)
    {

        $entityManager = $this->getEntityManager();

       
        $query = $entityManager->createQuery('UPDATE App\Entity\FicheDeDonneurDeSang f SET f.N_ordre = :val2 WHERE f.id = :val')
            ->setParameter('val', $val)
            ->setParameter('val2', $val2)
        ;
        $query->execute();
    ;
    }
}