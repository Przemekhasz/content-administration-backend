<?php

namespace App\Domain\Page\Dto;

class PageHeader
{
    public function __construct(
        private ?string    $id = null,
        private ?string $name = null,
        private bool    $isMain = false,
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

    public function isMain(): bool
    {
        return $this->isMain;
    }

    public function setIsMain(bool $isMain): void
    {
        $this->isMain = $isMain;
    }
}
