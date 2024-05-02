<?php

namespace App\Infrastructure\Factory\gallery;

use App\Domain\Gallery\Dto\Gallery;
use App\Infrastructure\Entity\Gallery\Gallery as GalleryEntity;
use App\Infrastructure\Entity\Gallery\Image as ImageEntity;

class GalleryFactory
{
    public function __construct(
        private readonly ImageFactory $imageFactory,
    ) {
    }

    public function createFromEntity(GalleryEntity $entity): Gallery
    {
        return new Gallery(
            id: $entity->getId(),
            name: $entity->getName(),
            images: array_map(fn (ImageEntity $imageEntity) => $this->imageFactory->createFromEntity($imageEntity),
                $entity->getImages()->toArray()
            )
        );
    }
}
