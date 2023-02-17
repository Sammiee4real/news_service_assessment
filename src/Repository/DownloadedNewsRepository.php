<?php

namespace App\Repository;

use App\Entity\DownloadedNews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DownloadedNews>
 *
 * @method DownloadedNews|null find($id, $lockMode = null, $lockVersion = null)
 * @method DownloadedNews|null findOneBy(array $criteria, array $orderBy = null)
 * @method DownloadedNews[]    findAll()
 * @method DownloadedNews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DownloadedNewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DownloadedNews::class);
    }

    public function save(DownloadedNews $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DownloadedNews $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DownloadedNews[] Returns an array of DownloadedNews objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DownloadedNews
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
