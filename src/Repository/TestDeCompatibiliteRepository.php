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
    
    public function findByExampleField($value): array
    {    
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\TestDeCompatibilite t , App\Entity\User u ,App\Entity\DemandeSang d , App\Entity\Malade m ,App\Entity\Service s
            WHERE t.demande = d.id and s.id = d.service and s.nom_service = :val OR t.demande = d.id and m.id = d.malade and m.malade = :val OR t.demande = d.id and m.id = d.malade and m.numero_cin = :val OR t.user = u.id and u.username = :val OR t.user = u.id and u.NUM_CIN =:val
            ORDER BY d.id ASC'
        )->setParameter('val', $value);
        // returns an array of Product objects
        return $query->execute();

    }

    
    public function findAllTC()
    {
        return $this->createQueryBuilder('t')
        ->orderBy('t.id', 'DESC')
        ->getQuery()
        ->getResult()
        ;
    }
    
}
