<?php

namespace App\Infrastructure\Service\Gallery;

use App\Domain\Gallery\Dto\Gallery;
use App\Infrastructure\Storage\Gallery\Interface\GalleryStorageInterface;

class GalleryService
{
    public function __construct(
        private readonly GalleryStorageInterface $galleryStorage,
    ) {
    }

    public function findById(string $id): Gallery
    {
        return $this->galleryStorage->findById($id);
    }

    public function findGalleryImages(string $galleryId): \Generator
    {
        return $this->galleryStorage->findGalleryImages($galleryId);
    }
}
