<?php

namespace App\Domain\Page\Dto;

class Logo
{
    public function __construct(
        private ?string    $id = null,
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
