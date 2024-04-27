<?php

namespace App\Infrastructure\Service\Project;

use App\Domain\Project\Dto\Project;
use App\Infrastructure\Storage\Project\Interface\ProjectStorageInterface;

class ProjectService
{
    public function __construct(
        private readonly ProjectStorageInterface $projectStorage,
    ) {
    }

    public function findById(string $id): Project
    {
        return $this->projectStorage->findById($id);
    }

    public function findProjectDetails(string $projectId): \Generator
    {
        return $this->projectStorage->findProjectDetails($projectId);
    }
}
