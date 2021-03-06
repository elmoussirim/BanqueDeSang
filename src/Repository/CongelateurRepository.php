<?php

namespace App\Repository;

use App\Entity\Congelateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Congelateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Congelateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Congelateur[]    findAll()
 * @method Congelateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CongelateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Congelateur::class);
    }

    // /**
    //  * @return Congelateur[] Returns an array of Congelateur objects
    //  */
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.type LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    

    public function UpdateExiste($value): ?int
    {
        $entityManager = $this->getEntityManager();
        
        $query = $entityManager->createQuery('UPDATE App\Entity\Congelateur c SET c.existe = :val1 WHERE c.id = :val')
        ->setParameter('val', $value)
        ->setParameter('val1', "non")
        ;
        $query->execute();
        return 1;
    }
}
