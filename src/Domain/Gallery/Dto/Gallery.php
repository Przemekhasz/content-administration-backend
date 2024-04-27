<?php

namespace App\Domain\Gallery\Dto;

use Doctrine\Common\Collections\Collection;

class Gallery
{
    public function __construct(
        private ?string $id = null,
        private ?string $name = null,
        private ?Collection $images = null,
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

    public function getImages(): ?Collection
    {
        return $this->images;
    }

    public function setImages(?Collection $images): void
    {
        $this->images = $images;
    }
}
