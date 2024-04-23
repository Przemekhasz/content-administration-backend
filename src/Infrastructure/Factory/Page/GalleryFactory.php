<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Gallery;
use App\Infrastructure\Entity\Page\Gallery as GalleryEntity;

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
