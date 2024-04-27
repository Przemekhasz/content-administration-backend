<?php

namespace App\Application\Project;

use App\Domain\Project\Dto\Project;
use App\Domain\Project\ProjectFacade;

class ProjectAdapter
{
    public function __construct(
        private readonly ProjectFacade $projectFacade,
    ) {
    }

    public function findById(string $id): Project
    {
        return $this->projectFacade->findById($id);
    }

    public function findProjectDetails(string $projectId): \Generator
    {
        return $this->projectFacade->findProjectDetails($projectId);
    }
}
