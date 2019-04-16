<?php

namespace App\Repository;
use Date;
use App\Entity\Poche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Poche|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poche|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poche[]    findAll()
 * @method Poche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PocheRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Poche::class);
    }

    // /**
    //  * @return Poche[] Returns an array of Poche objects
    //  */
    
    public function findAllPoches()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
/*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.groupe_sanguins = :val  OR p.user = :u.id and u.username = :val')
            ->setParameter('val', $value)
            ->orderBy('p.type')
            ->getQuery()
            ->getResult()
        ;
    }
 */   
    public function findByExampleField($value)
    {    
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Poche p , App\Entity\User u
            WHERE p.groupe_sanguin = :val OR u.id = p.user and u.username = :val  OR u.id = p.user and u.NUM_CIN = :val 
            ORDER BY p.type'
        )->setParameter('val', $value);
        // returns an array of Product objects
        return $query->execute();

    }
    public function findOneBySomeField($value,$val): ?Poche
    {
        return $this->createQueryBuilder('p')
            ->where('p.type = :val')
            ->andWhere('p.n_ordre = :value')
            ->setParameter('value', $value)
            ->setParameter('val', $val)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    public function e_gestion($value,$valeur)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT p,COUNT(p.id) as total
            FROM App\Entity\Poche p
            WHERE p.groupe_sanguin = :val and p.date_action = :valeur
            and ( p.statut = 'Poche en attente ---> Poche en stock' or p.statut = 'Poche sortie ---> Poche en stock' or p.statut = 'Poche en stock') group By p.type "
        )
         ->setParameter('val', $value)
         ->setParameter('valeur', $valeur);
        return $query->execute();
    }

        
    public function s_gestion($value,$valeur) 
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT p,COUNT(p.id) as total
            FROM App\Entity\Poche p
            WHERE p.groupe_sanguin = :val and p.date_action = :valeur
            and ( p.statut = 'Poche en stock ---> Poche sortie' or p.statut = 'Poche reservée ---> Poche sortie') group By p.type"
        )->setParameter('val', $value)
        ->setParameter('valeur', $valeur);

        return $query->execute();
    }

    public function egestion($valeur) 
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT p,COUNT(p.id) as total
            FROM App\Entity\Poche p
            WHERE p.date_action = :valeur
            and ( p.statut  = 'Poche en attente ---> Poche en stock' or p.statut = 'Poche sortie ---> Poche en stock' or p.statut = 'Poche en stock' ) group By p.statut"
        )->setParameter('valeur', $valeur);

        return $query->execute();
    }

    public function sgestion($valeur) 
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT p,COUNT(p.id) as total
            FROM App\Entity\Poche p
            WHERE p.date_action = :valeur
            and ( p.statut = 'Poche en stock ---> Poche sortie' or p.statut = 'Poche reservée ---> Poche sortie') group By p.statut"
        )->setParameter('valeur', $valeur);

        return $query->execute();
    }

    public function tgestion() 
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT p,COUNT(p.id) as total
            FROM App\Entity\Poche p
            WHERE p.statut = 'Poche en attente ---> Poche en stock' or p.statut = 'Poche sortie ---> Poche en stock' or p.statut = 'Poche en stock' group By p.statut"
        );

        return $query->execute();
    }
}
