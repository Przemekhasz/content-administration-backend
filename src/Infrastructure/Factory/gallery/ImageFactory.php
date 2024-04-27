<?php

namespace App\Infrastructure\Factory\gallery;

use App\Domain\Gallery\Dto\Image;
use App\Infrastructure\Entity\Gallery\Image as ImageEntity;

class ImageFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(ImageEntity $entity): Image
    {
        return new Image(
            id: $entity->getId(),
            title: $entity->getTitle(),
            description: $entity->getDescription(),
            imagePath: $entity->getImagePath(),
            categories: $entity->getCategories(),
            tags: $entity->getTags(),
        );
    }
}
