<?php

namespace App\Application\Gallery;

use App\Domain\Gallery\Dto\Gallery;
use App\Domain\Gallery\GalleryFacade;

class GalleryAdapter
{
    public function __construct(
        private readonly GalleryFacade $galleryFacade,
    ) {
    }

    public function findGalleryById(string $id): Gallery
    {
        return $this->galleryFacade->findById($id);
    }

    public function findGalleryImages(string $galleryId): \Generator
    {
        return $this->galleryFacade->findGalleryImages($galleryId);
    }
}
