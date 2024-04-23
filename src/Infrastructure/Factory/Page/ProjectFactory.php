<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Project;
use App\Domain\User\Dto\User;
use App\Infrastructure\Entity\Page\Project as ProjectEntity;

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
