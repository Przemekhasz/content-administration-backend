<?php

namespace App\Infrastructure\Http\Dto\Project;

use App\Infrastructure\Http\Dto\User\HttpUser;
use OpenApi\Attributes as OA;

class HttpProject
{
    public function __construct(
        #[OA\Property()]
        private ?string $id = null,
        #[OA\Property()]
        private ?string $title = null,
        #[OA\Property()]
        private ?string $mainDescription = null,
        #[OA\Property()]
        private ?HttpUser $author = null,
        #[OA\Property()]
        private ?array $details = null,
        #[OA\Property()]
        private ?array $categories = null,
        #[OA\Property()]
        private ?array $tags = null,
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

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function setDetails(?array $details): void
    {
        $this->details = $details;
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
