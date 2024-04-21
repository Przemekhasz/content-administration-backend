<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\CMS\MenuItem;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class MenuItemRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, MenuItem::class);
    }
}
