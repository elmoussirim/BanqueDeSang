<?php

namespace App\Repository;

use App\Entity\Alertes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Alertes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alertes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alertes[]    findAll()
 * @method Alertes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlertesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Alertes::class);
    }
    public function findAllAlertes() 
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

}
