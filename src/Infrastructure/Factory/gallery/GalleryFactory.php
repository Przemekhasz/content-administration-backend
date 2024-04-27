<?php

namespace App\Infrastructure\Factory\gallery;

use App\Domain\Gallery\Dto\Gallery;
use App\Infrastructure\Entity\Gallery\Gallery as GalleryEntity;

class GalleryFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(GalleryEntity $entity): Gallery
    {
        return new Gallery(
            id: $entity->getId(),
            name: $entity->getName(),
            images: $entity->getImages()
        );
    }
}
