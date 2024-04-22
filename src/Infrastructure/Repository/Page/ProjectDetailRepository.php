<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\ProjectDetail;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ProjectDetailRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, ProjectDetail::class);
    }
}
