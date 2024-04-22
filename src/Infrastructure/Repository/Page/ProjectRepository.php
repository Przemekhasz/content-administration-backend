<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\Project;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ProjectRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Project::class);
    }
}
