<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\CMS\Tag;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class TagRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Tag::class);
    }
}
