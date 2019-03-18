<?php

namespace App\Repository;

use App\Entity\PocheEntree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PocheEntree|null find($id, $lockMode = null, $lockVersion = null)
 * @method PocheEntree|null findOneBy(array $criteria, array $orderBy = null)
 * @method PocheEntree[]    findAll()
 * @method PocheEntree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PocheEntreeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PocheEntree::class);
    }

    // /**
    //  * @return PocheEntree[] Returns an array of PocheEntree objects
    // */
    public function findByType($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.Type = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function ModifierStatut($val1,$val2,$val3): ?int
    {

        $entityManager = $this->getEntityManager();

        
        $query = $entityManager->createQuery('UPDATE App\Entity\PocheEntree p SET p.statut = :val2 WHERE p.N_ordre = :val1 AND p.Type = :val3')
        ->setParameter('val1', $val1)
        ->setParameter('val2', $val2)
        ->setParameter('val3', $val3)

        ;
        $query->execute();
        return 1;
        }


    public function findOneBySomeField($value,$val): ?PocheEntree
    {
        return $this->createQueryBuilder('p')
            ->where('p.Type = :val')
            ->andWhere('p.N_ordre = :value')
            ->setParameter('value', $value)
            ->setParameter('val', $val)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
