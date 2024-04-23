<?php

namespace App\Domain\Page\Dto;

use App\Domain\User\Dto\User;
use Doctrine\Common\Collections\Collection;

class Project
{
    public function __construct(
        private ?string    $id = null,
        private ?string $title = null,
        private ?string $mainDescription = null,
        private ?Collection $details = null,
        private ?User $author = null,
        private ?Collection $categories = null,
        private ?Collection $tags = null,
    ) {}

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

    public function getDetails(): ?Collection
    {
        return $this->details;
    }

    public function setDetails(?Collection $details): void
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

    public function getCategories(): ?Collection
    {
        return $this->categories;
    }

    public function setCategories(?Collection $categories): void
    {
        $this->categories = $categories;
    }

    public function getTags(): ?Collection
    {
        return $this->tags;
    }

    public function setTags(?Collection $tags): void
    {
        $this->tags = $tags;
    }
}
