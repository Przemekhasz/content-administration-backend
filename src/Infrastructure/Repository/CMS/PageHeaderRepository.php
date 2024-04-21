<?php

namespace App\Infrastructure\Repository\CMS;

use App\Infrastructure\Entity\CMS\PageHeader;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class PageHeaderRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, PageHeader::class);
    }
}
