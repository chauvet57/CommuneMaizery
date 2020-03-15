<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Activite;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Activite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activite[]    findAll()
 * @method Activite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activite::class);
    }

     /**
     * @return Query
     */
    public function findAllVisibleQuery(): Query
    {
        return $this->findVisibleQuery()
            ->getQuery();
           
    }



    /**
     * @return Activite[] 
     */
    public function findAllActualite(): array
    {
        return $this->findVisibleQueryActualite()
        ->getQuery()
        ->getResult();
    }

    private function findVisibleQueryActualite(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
        ->where('p.Type = 1');
    }


      /**
     * @return Activite[] 
     */
    public function findAllEvenement(): array
    {
        return $this->findVisibleQueryEvenement()
        ->getQuery()
        ->getResult();
    }

    private function findVisibleQueryEvenement(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
        ->where('p.Type = 2');
    }

      /**
     * @return Activite[] 
     */
    public function findAllEcole(): array
    {
        return $this->findVisibleQueryEcole()
        ->getQuery()
        ->getResult();
    }

    private function findVisibleQueryEcole(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
        ->where('p.Type = 3');
    }


    /**
     * @return Activite[] 
     */
    public function findLatest(): array
    {
        $activite = $this->findVisibleQuery()
                    ->setMaxResults(3)            
                    ->getQuery()
                    ->getResult();
        
        return $activite;
        
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p');
        
    }
 
    // /**
    //  * @return Activite[] Returns an array of Activite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Activite
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
