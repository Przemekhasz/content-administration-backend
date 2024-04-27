<?php

namespace App\Infrastructure\Factory\Project;

use App\Domain\Project\Dto\Project;
use App\Domain\User\Dto\User;
use App\Infrastructure\Entity\Project\Project as ProjectEntity;

class ProjectFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(ProjectEntity $entity): Project
    {
        return new Project(
            id: $entity->getId(),
            title: $entity->getTitle(),
            mainDescription: $entity->getMainDescription(),
            details: $entity->getDetails(),
            author: new User(
                id: $entity->getAuthor()->getId(),
                username: $entity->getAuthor()->getUsername(),
            ),
            categories: $entity->getCategories(),
            tags: $entity->getTags(),
        );
    }
}
