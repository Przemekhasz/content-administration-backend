<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\CMS\Category;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class CategoryRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Category::class);
    }
}
