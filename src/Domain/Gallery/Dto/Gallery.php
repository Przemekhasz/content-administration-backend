<?php

namespace App\Domain\Gallery\Dto;

class Gallery
{
    public function __construct(
        private ?string $id = null,
        private ?string $name = null,
        private ?array $images = [],
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): void
    {
        $this->images = $images;
    }
}
