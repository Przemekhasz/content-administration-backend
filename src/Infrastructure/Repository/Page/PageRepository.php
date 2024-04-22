<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;

class PageRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Page::class);
    }

    public function findById(string $id): ?Page
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function findPageWithGalleries(string $pageId)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p', 'g', 'i')
            ->leftJoin('p.galleries', 'g')
            ->leftJoin('g.images', 'i')
            ->where('p.id = :id')
            ->setParameter('id', $pageId);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
