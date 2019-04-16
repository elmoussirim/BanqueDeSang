<?php

namespace App\Repository;

use App\Entity\HistoriquePoche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HistoriquePoche|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriquePoche|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriquePoche[]    findAll()
 * @method HistoriquePoche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriquePocheRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HistoriquePoche::class);
    }

    // /**
    //  * @return HistoriquePoche[] Returns an array of HistoriquePoche objects
    //  */
    
    public function findBySomeField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.poche = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    public function findByExampleField($value)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT h
            FROM App\Entity\HistoriquePoche h , App\Entity\Poche p 
            WHERE h.poche = p.id and p.n_ordre = :val
            ORDER BY h.id ASC'
        )->setParameter('val', $value);
        // returns an array of Product objects
        return $query->execute();
        }
    
}
