<?php

namespace App\Infrastructure\Http\Dto\Page;

use App\Domain\Page\Dto\Image;

use Doctrine\Common\Collections\Collection;
use OpenApi\Attributes as OA;

class HttpGallery
{
    public function __construct(
        #[OA\Property]
        private ?string    $id = null,
        #[OA\Property]
        private ?string $name = null,
        #[OA\Property]
        private ?Collection $images = null,
    ) {}

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
