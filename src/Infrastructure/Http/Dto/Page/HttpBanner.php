<?php

namespace App\Infrastructure\Http\Dto\Page;

use OpenApi\Attributes as OA;

class HttpBanner
{
    public function __construct(
        #[OA\Property]
        private ?string    $id = null,
        #[OA\Property]
        private ?string $image = null,
    ) {}

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}
