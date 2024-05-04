<?php

namespace App\Infrastructure\Http\Dto\Gallery;

use OpenApi\Attributes as OA;

class HttpGallery
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
        #[OA\Property]
        private ?string $name = null,
        #[OA\Property]
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
