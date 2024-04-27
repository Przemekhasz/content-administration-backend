<?php

namespace App\Domain\Project;

use App\Domain\Project\Dto\Project;
use App\Infrastructure\Service\Project\ProjectService;

class ProjectFacade
{
    public function __construct(
        private readonly ProjectService $projectService,
    ) {
    }

    public function findById(string $id): Project
    {
        return $this->projectService->findById($id);
    }

    public function findProjectDetails(string $projectId): \Generator
    {
        return $this->projectService->findProjectDetails($projectId);
    }
}
