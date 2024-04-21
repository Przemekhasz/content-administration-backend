<?php

namespace App\Infrastructure\Repository\CMS;

use App\Infrastructure\Entity\CMS\Page;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;

class PageRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Page::class);
    }

    public function findAllPagesWithDetails()
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.banner', 'b')
            ->addSelect('b')
            ->leftJoin('p.logo', 'l')
            ->addSelect('l')
            ->leftJoin('p.menuItems', 'mi')
            ->addSelect('mi')
            ->leftJoin('p.pageHeaders', 'ph')
            ->addSelect('ph')
            ->leftJoin('p.socialMediaIcons', 'smi')
            ->addSelect('smi');

        return $qb->getQuery()->getResult(AbstractQuery::HYDRATE_OBJECT);
    }
}
