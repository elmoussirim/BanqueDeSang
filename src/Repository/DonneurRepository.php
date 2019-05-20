<?php

namespace App\Repository;
use DateTime;

use App\Entity\Donneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Donneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donneur[]    findAll()
 * @method Donneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonneurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Donneur::class);
    }
     

   /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function ModifierDateApte($value) : int
    {
        $entityManager = $this->getEntityManager();

       
        $query = $entityManager->createQuery('UPDATE App\Entity\Donneur d SET  d.date_du_dernier_don = :valeur1 , d.don_valide = :valeur2 WHERE d.NUM_CIN = :val')
            ->setParameter('val', $value)
            ->setParameter('valeur1', new DateTime())
            ->setParameter('valeur2', "Donneur Valide")
        ;
        $query->execute();
        return 1;

    }
    
    public function ModifierApteInapte($val1,$val2) : int
    {
        $entityManager = $this->getEntityManager();

       
        $query = $entityManager->createQuery('UPDATE App\Entity\Donneur d SET d.don_valide = :val2 WHERE d.NUM_CIN = :val1')
            ->setParameter('val1', $val1)
            ->setParameter('val2', $val2)
        ;
        $query->execute();
        return 1;

    }
    public function findOneBySomeField($value): ?Donneur
    {

        return $this->createQueryBuilder('d')
            ->andWhere('d.NUM_CIN = :val or d.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
