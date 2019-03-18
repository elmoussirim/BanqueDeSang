<?php

namespace App\Repository;

use App\Entity\PocheEnAttente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PocheEnAttente|null find($id, $lockMode = null, $lockVersion = null)
 * @method PocheEnAttente|null findOneBy(array $criteria, array $orderBy = null)
 * @method PocheEnAttente[]    findAll()
 * @method PocheEnAttente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PocheEnAttenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PocheEnAttente::class);
    }

    // /**
    //  * @return PocheEnAttente[] Returns an array of PocheEnAttente objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.N_ordre = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function ModifierStatut($val1,$val2): ?int
    {

        $entityManager = $this->getEntityManager();

        
        $query = $entityManager->createQuery('UPDATE App\Entity\PocheEnAttente p SET p.statut = :val2 WHERE p.N_ordre = :val1')
        ->setParameter('val1', $val1)
        ->setParameter('val2', $val2)
        ;
        $query->execute();
        return 1;
        }

        public function findOneBySomeField($value,$val): ?PocheEnAttente
        {
            return $this->createQueryBuilder('p')
                ->where('p.Type LIKE :val')
                ->andWhere('p.N_ordre = :value and p.Type Like :val')
                ->setParameter('value', $value)
                ->setParameter('val', '%'.$val.'%')
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }

}
