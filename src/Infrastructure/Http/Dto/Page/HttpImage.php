<?php

namespace App\Infrastructure\Http\Dto\Page;

use App\Domain\Page\Dto\Category;
use App\Domain\Page\Dto\Gallery;
use App\Domain\Page\Dto\Tag;
use Doctrine\Common\Collections\Collection;
use OpenApi\Attributes as OA;

class HttpImage
{
    public function __construct(
        #[OA\Property]
        private ?string    $id = null,
        #[OA\Property]
        private ?string $title = null,
        #[OA\Property]
        private ?string $description = null,
        #[OA\Property]
        private ?string $imagePath = null,
        #[OA\Property]
        private ?HttpGallery $gallery = null,
        #[OA\Property]
        private ?Collection $categories = null,
        #[OA\Property]
        private ?Collection $tags = null,
    ) {}

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

    public function getCategories(): ?Collection
    {
        return $this->categories;
    }

    public function setCategories(?Collection $categories): void
    {
        $this->categories = $categories;
    }

    public function getTags(): ?Collection
    {
        return $this->tags;
    }

    public function setTags(?Collection $tags): void
    {
        $this->tags = $tags;
    }
}
