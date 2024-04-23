<?php

namespace App\Infrastructure\Http\Dto\Page;

use App\Infrastructure\Http\Dto\User\HttpUser;
use Doctrine\Common\Collections\Collection;
use OpenApi\Attributes as OA;

class HttpProject
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
        #[OA\Property]
        private ?string $title = null,
        #[OA\Property]
        private ?string $mainDescription = null,
        #[OA\Property]
        private ?HttpUser $author = null,
        #[OA\Property]
        private ?Collection $details = null,
        #[OA\Property]
        private ?Collection $categories = null,
        #[OA\Property]
        private ?Collection $tags = null,
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

    public function getAuthor(): ?HttpUser
    {
        return $this->author;
    }

    public function setAuthor(?HttpUser $author): void
    {
        $this->author = $author;
    }

    public function getDetails(): ?Collection
    {
        return $this->details;
    }

    public function setDetails(?Collection $details): void
    {
        $this->details = $details;
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
