<?php

namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Service|null find($id, $lockMode = null, $lockVersion = null)
 * @method Service|null findOneBy(array $criteria, array $orderBy = null)
 * @method Service[]    findAll()
 * @method Service[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Service::class);
    }

    // /**
    //  * @return Service[] Returns an array of Service objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.nom_service LIKE :val OR s.ChService LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    
    public function UpdateExiste($value): ?int
    {
        $entityManager = $this->getEntityManager();
        
        $query = $entityManager->createQuery('UPDATE App\Entity\Service s SET s.existe = :val1 WHERE s.id = :val')
        ->setParameter('val', $value)
        ->setParameter('val1', "non")
        ;
        $query->execute();
        return 1;
    }
    
}
