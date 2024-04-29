<?php

namespace App\Infrastructure\Repository\Styles;

use App\Infrastructure\Entity\Styles\GlobalStyles;
use App\Infrastructure\Exception\Styles\GlobalStylesNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
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
     * @throws GlobalStylesNotFoundException
     */
    public function findById(string $id): ?GlobalStyles
    {
        try {
            return $this->createQueryBuilder('gs')
                ->where('gs.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GlobalStylesNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     * @throws GlobalStylesNotFoundException
     */
    public function countGlobalStyles(): int
    {
        try {
            return (int) $this->createQueryBuilder('gs')
                ->select('COUNT(gs.id)')
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GlobalStylesNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws GlobalStylesNotFoundException
     */
    public function findLastGlobalStyles(): ?GlobalStyles
    {
        try {
            return $this->createQueryBuilder('gs')
                ->orderBy('gs.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GlobalStylesNotFoundException();
        }
    }
}
