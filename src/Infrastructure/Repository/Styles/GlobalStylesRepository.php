<?php

namespace App\Infrastructure\Repository\Styles;

use App\Infrastructure\Entity\Styles\GlobalStyles;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class GlobalStylesRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, GlobalStyles::class);
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findById(string $id): ?GlobalStyles
    {
        $qb = $this->createQueryBuilder('gs')
            ->where('gs.id = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function countGlobalStyles(): int
    {
        $qb = $this->createQueryBuilder('gs')
            ->select('COUNT(gs.id)');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findLastGlobalStyles(): ?GlobalStyles
    {
        $qb = $this->createQueryBuilder('gs')
            ->orderBy('gs.id', 'DESC')
            ->setMaxResults(1);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
