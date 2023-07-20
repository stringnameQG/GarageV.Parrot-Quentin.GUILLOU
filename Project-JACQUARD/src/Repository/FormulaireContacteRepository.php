<?php

namespace App\Repository;

use App\Entity\FormulaireContacte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormulaireContacte>
 *
 * @method FormulaireContacte|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormulaireContacte|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormulaireContacte[]    findAll()
 * @method FormulaireContacte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormulaireContacteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormulaireContacte::class);
    }

    public function save(FormulaireContacte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FormulaireContacte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FormulaireContacte[] Returns an array of FormulaireContacte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormulaireContacte
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
