<?php

namespace App\Infrastructure\Factory\Project;

use App\Domain\Project\Dto\Project;
use App\Domain\User\Dto\User;
use App\Infrastructure\Entity\Page\Category as CategoryEntity;
use App\Infrastructure\Entity\Page\Tag as TagEntity;
use App\Infrastructure\Entity\Project\Project as ProjectEntity;
use App\Infrastructure\Entity\Project\ProjectDetail as ProjectDetailEntity;
use App\Infrastructure\Factory\Page\CategoryFactory;
use App\Infrastructure\Factory\Page\TagFactory;

class ProjectFactory
{
    public function __construct(
        private readonly ProjectDetailFactory $projectDetailFactory,
        private readonly CategoryFactory $categoryFactory,
        private readonly TagFactory $tagFactory,
    ) {
    }

    public function createFromEntity(ProjectEntity $entity): Project
    {
        return new Project(
            id: $entity->getId(),
            title: $entity->getTitle(),
            mainDescription: $entity->getMainDescription(),
            status: $entity->getStatus(),
            isPinned: $entity->isPinned(),
            details: array_map(fn (ProjectDetailEntity $projectDetailEntity) => $this->projectDetailFactory->createFromEntity($projectDetailEntity),
                $entity->getDetails()->toArray()
            ),
            author: new User(
                id: $entity->getAuthor()->getId(),
                username: $entity->getAuthor()->getUsername(),
            ),
            categories: array_map(fn (CategoryEntity $categoryEntity) => $this->categoryFactory->createFromEntity($categoryEntity),
                $entity->getCategories()->toArray()
            ),
            tags: array_map(fn (TagEntity $tagEntity) => $this->tagFactory->createFromEntity($tagEntity),
                $entity->getTags()->toArray()
            ),
        );
    }
}
