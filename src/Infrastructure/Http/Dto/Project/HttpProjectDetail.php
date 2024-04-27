<?php

namespace App\Infrastructure\Http\Dto\Project;

use OpenApi\Attributes as OA;

class HttpProjectDetail
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
        #[OA\Property]
        private ?HttpProject $project = null,
        #[OA\Property]
        private ?string $description = null,
        #[OA\Property]
        private ?string $imagePath = null,
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

    public function getProject(): ?HttpProject
    {
        return $this->project;
    }

    public function setProject(?HttpProject $project): void
    {
        $this->project = $project;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }
}
