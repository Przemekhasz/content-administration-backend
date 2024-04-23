<?php

namespace App\Domain\Page\Dto;

use Doctrine\Common\Collections\Collection;

class Image
{
    public function __construct(
        private ?string $id = null,
        private ?string $title = null,
        private ?string $description = null,
        private ?string $imagePath = null,
        private ?Gallery $gallery = null,
        private ?Collection $categories = null,
        private ?Collection $tags = null,
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

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): void
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
