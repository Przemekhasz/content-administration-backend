<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\PageHeader;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class PageHeaderRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, PageHeader::class);
    }
}
