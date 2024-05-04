<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Exception\Page\PageGalleryNotFoundException;
use App\Infrastructure\Exception\Page\PageNotFoundException;
use App\Infrastructure\Exception\Page\PageProjectNotFoundException;
use App\Infrastructure\Exception\Page\PageStylesNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class PageRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Page::class);
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageNotFoundException
     */
    public function findById(string $id): Page
    {
        try {
            return $this->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $id)
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new PageNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageGalleryNotFoundException
     */
    public function findPageWithGalleries(string $pageId): Page
    {
        try {
            return $this->createQueryBuilder('p')
                ->leftJoin('p.galleries', 'g')
                ->addSelect('g')
                ->where('p.id = :id')
                ->setParameter('id', $pageId)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new PageGalleryNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageProjectNotFoundException
     */
    public function findProjectsByPageId(string $pageId)
    {
        try {
            return $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.id = :id')
                ->setParameter('id', $pageId)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new PageProjectNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageStylesNotFoundException
     */
    public function findStylesByPageId(string $pageId): ?Page
    {
        try {
            return $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.id = :id')
                ->setParameter('id', $pageId)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new PageStylesNotFoundException();
        }
    }
}
