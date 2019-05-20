<?php

namespace App\Repository;

use App\Entity\Tubes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tubes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tubes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tubes[]    findAll()
 * @method Tubes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TubesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tubes::class);
    }

    // /**
    //  * @return Tubes[] Returns an array of Tubes objects
    //  */
    
    public function TubesNonTester()
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.Testee = :val')
            ->setParameter('val', "Non")
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function ModifierTerminer ($val1,$val2): ?int
    {

        $entityManager = $this->getEntityManager();

       
        $query = $entityManager->createQuery('UPDATE App\Entity\Tubes t SET t.Testee = :val2 WHERE t.id = :val1')
            ->setParameter('val1', $val1)
            ->setParameter('val2', $val2)
        ;
        $query->execute();
        return 1;
    }

    public function findByExampleField ($value)
    {
        return $this->createQueryBuilder('t')
            ->andwhere('t.CinDonneur = :val OR t.id = :val')
            ->setParameter('val',$value)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findBySomeField()
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.id', 'DESC')
            ->setMaxResults(100)

            ->getQuery()
            
            ->getResult()
        ;
    }
    public function findOneBySomeField($value): ?Tubes
    {
        return $this->createQueryBuilder('t')
            ->Where('t.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
