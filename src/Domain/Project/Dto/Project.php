<?php

namespace App\Domain\Project\Dto;

use App\Domain\User\Dto\User;

class Project
{
    public function __construct(
        private ?string $id = null,
        private ?string $title = null,
        private ?string $mainDescription = null,
        private ?string $status = null,
        private bool $isPinned = false,
        private ?array $details = [],
        private ?User $author = null,
        private ?array $categories = [],
        private ?array $tags = [],
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

    public function getMainDescription(): ?string
    {
        return $this->mainDescription;
    }

    public function setMainDescription(?string $mainDescription): void
    {
        $this->mainDescription = $mainDescription;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function isPinned(): bool
    {
        return $this->isPinned;
    }

    public function setIsPinned(bool $isPinned): void
    {
        $this->isPinned = $isPinned;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function setDetails(?array $details): void
    {
        $this->details = $details;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): void
    {
        $this->author = $author;
    }

    public function getCategories(): ?array
    {
        return $this->categories;
    }

    public function setCategories(?array $categories): void
    {
        $this->categories = $categories;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): void
    {
        $this->tags = $tags;
    }
}
