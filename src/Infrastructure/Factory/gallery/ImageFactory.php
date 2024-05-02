<?php

namespace App\Infrastructure\Factory\gallery;

use App\Domain\Gallery\Dto\Image;
use App\Infrastructure\Entity\Gallery\Image as ImageEntity;
use App\Infrastructure\Entity\Page\Category as CategoryEntity;
use App\Infrastructure\Entity\Page\Tag as TagEntity;
use App\Infrastructure\Factory\Page\CategoryFactory;
use App\Infrastructure\Factory\Page\TagFactory;

class ImageFactory
{
    public function __construct(
        private readonly CategoryFactory $categoryFactory,
        private readonly TagFactory $tagFactory,
    ) {
    }

    public function createFromEntity(ImageEntity $entity): Image
    {
        return new Image(
            id: $entity->getId(),
            title: $entity->getTitle(),
            description: $entity->getDescription(),
            imagePath: $entity->getImagePath(),
            categories: array_map(fn (CategoryEntity $categoryEntity) => $this->categoryFactory->createFromEntity($categoryEntity),
                $entity->getCategories()->toArray()
            ),
            tags: array_map(fn (TagEntity $tagEntity) => $this->tagFactory->createFromEntity($tagEntity),
                $entity->getTags()->toArray()
            ),
        );
    }
}
