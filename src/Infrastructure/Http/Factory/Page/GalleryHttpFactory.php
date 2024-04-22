<?php

namespace App\Infrastructure\Http\Factory\Page;


use App\Domain\Page\Dto\Gallery;
use App\Infrastructure\Http\Dto\Page\HttpGallery;

class GalleryHttpFactory
{
    public function __construct() {}

    public function createDomainObject(HttpGallery $http): Gallery
    {
        return new Gallery(
            id: $http->getId(),
            name: $http->getName(),
            images: $http->getImages()

        );
    }

    public function createHttpObject(Gallery $dto): HttpGallery
    {
        return new HttpGallery(
            id: $dto->getId(),
            name: $dto->getName(),
            images: $dto->getImages()
        );
    }
}
