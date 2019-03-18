<?php

namespace App\Repository;

use App\Entity\DemandeSang;
use App\Entity\Service;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DemandeSang|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeSang|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeSang[]    findAll()
 * @method DemandeSang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeSangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DemandeSang::class);
    }

    // /**
    //  * @return DemandeSang[] Returns an array of DemandeSang objects
    //  */
    
    public function findByExampleField($value): array
    {    
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT d
            FROM App\Entity\DemandeSang d , App\Entity\Service s
            WHERE s.id = d.service and s.nom_service = :val OR d.id = :val OR d.cin_malade = :val
            ORDER BY d.id ASC'
        )->setParameter('val', $value);
        // returns an array of Product objects
        return $query->execute();

    }
    
    public function ModifierReponse($value): ?int
    {
        $entityManager = $this->getEntityManager();

        
        $query = $entityManager->createQuery('UPDATE App\Entity\DemandeSang d SET d.reponse = :val2 WHERE d.id = :val1')
        ->setParameter('val1', $value)
        ->setParameter('val2', 'existe')
        ;
        $query->execute();
        return 1;
    }
    
}
