<?php

namespace App\Infrastructure\Storage\Gallery\Interface;

use App\Domain\Gallery\Dto\Gallery;

interface GalleryStorageInterface
{
    public function findById(string $id): Gallery;
    public function findGalleryImages(string $galleryId): \Generator;
}
