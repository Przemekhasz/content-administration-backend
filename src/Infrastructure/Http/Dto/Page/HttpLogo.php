<?php

namespace App\Infrastructure\Http\Dto\Page;

use OpenApi\Attributes as OA;

class HttpLogo
{
    public function __construct(
        #[OA\Property]
        private ?string    $id = null,
        #[OA\Property]
        private ?string $logo = null,
    ) {}

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function setLogo(?string $logo): void
    {
        $this->logo = $logo;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }
}
