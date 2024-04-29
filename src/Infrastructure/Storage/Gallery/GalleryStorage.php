<?php

namespace App\Infrastructure\Storage\Gallery;

use App\Domain\Gallery\Dto\Gallery;
use App\Infrastructure\Exception\Gallery\GalleryImageNotFoundException;
use App\Infrastructure\Exception\Gallery\GalleryNotFoundException;
use App\Infrastructure\Factory\gallery\GalleryFactory;
use App\Infrastructure\Factory\gallery\ImageFactory;
use App\Infrastructure\Repository\Gallery\GalleryRepository;
use App\Infrastructure\Repository\Gallery\ImageRepository;
use App\Infrastructure\Storage\Gallery\Interface\GalleryStorageInterface;

class GalleryStorage implements GalleryStorageInterface
{
    public function __construct(
        private readonly GalleryRepository $galleryRepository,
        private readonly GalleryFactory $galleryFactory,
        private readonly ImageRepository $imageRepository,
        private readonly ImageFactory $imageFactory,
    ) {
    }

    /**
     * @throws GalleryNotFoundException
     */
    public function findById(string $id): Gallery
    {
        $gallery = $this->galleryRepository->findById($id);

        return $this->galleryFactory->createFromEntity($gallery);
    }

    /**
     * @throws GalleryImageNotFoundException
     */
    public function findGalleryImages(string $galleryId): \Generator
    {
        $projectDetail = $this->imageRepository->findByGalleryId($galleryId);

        return $this->getGenerator($projectDetail);
    }

    private function getGenerator(array $entities): \Generator
    {
        foreach ($entities as $entity) {
            yield $this->imageFactory->createFromEntity($entity);
        }
    }
}
