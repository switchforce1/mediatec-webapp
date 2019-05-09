<?php

namespace App\Repository\Media;

use App\Entity\Media\MediaCollectionMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MediaCollectionMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaCollectionMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaCollectionMedia[]    findAll()
 * @method MediaCollectionMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaCollectionMediaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MediaCollectionMedia::class);
    }

    // /**
    //  * @return MediaCollectionMedia[] Returns an array of MediaCollectionMedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MediaCollectionMedia
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
