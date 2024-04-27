<?php

namespace App\Infrastructure\Repository\Styles;

use App\Infrastructure\Entity\Styles\Styles;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;

class StylesRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Styles::class);
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findById(string $id): ?Styles
    {
        $qb = $this->createQueryBuilder('s')
            ->where('s.id = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
