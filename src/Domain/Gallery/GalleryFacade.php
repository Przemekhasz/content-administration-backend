<?php

namespace App\Domain\Gallery;

use App\Domain\Gallery\Dto\Gallery;
use App\Infrastructure\Service\Gallery\GalleryService;

class GalleryFacade
{
    public function __construct(
        private readonly GalleryService $galleryService,
    ) {
    }

    public function findById(string $id): Gallery
    {
        return $this->galleryService->findById($id);
    }

    public function findGalleryImages(string $galleryId): \Generator
    {
        return $this->galleryService->findGalleryImages($galleryId);
    }
}
