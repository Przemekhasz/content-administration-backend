<?php

namespace App\Infrastructure\Http\Dto\Gallery;

use OpenApi\Attributes as OA;

class HttpImage
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
        #[OA\Property]
        private ?string $title = null,
        #[OA\Property]
        private ?string $description = null,
        #[OA\Property]
        private ?string $imagePath = null,
        #[OA\Property]
        private ?HttpGallery $gallery = null,
        #[OA\Property]
        private ?array $categories = [],
        #[OA\Property]
        private ?array $tags = [],
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getGallery(): ?HttpGallery
    {
        return $this->gallery;
    }

    public function setGallery(?HttpGallery $gallery): void
    {
        $this->gallery = $gallery;
    }

    public function getCategories(): ?array
    {
        return $this->categories;
    }

    public function setCategories(?array $categories): void
    {
        $this->categories = $categories;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): void
    {
        $this->tags = $tags;
    }
}
