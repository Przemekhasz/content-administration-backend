<?php

namespace App\Infrastructure\Http\Dto\Page;

use OpenApi\Attributes as OA;

class HttpSocialMediaLinkIcons
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
        #[OA\Property]
        private ?string $name = null,
        #[OA\Property]
        private ?string $url = null,
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
