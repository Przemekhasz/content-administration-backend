<?php

namespace App\Infrastructure\Repository\Styles;

use App\Infrastructure\Entity\Styles\Styles;
use App\Infrastructure\Exception\Styles\StylesNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class StylesRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Styles::class);
    }

    /**
     * @throws NonUniqueResultException
     * @throws StylesNotFoundException
     */
    public function findById(string $id): ?Styles
    {
        try {
            return $this->createQueryBuilder('s')
                ->where('s.id = :id')
                ->setParameter('id', $id)
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new StylesNotFoundException();
        }
    }
}
