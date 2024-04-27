<?php

namespace App\Infrastructure\Storage\Project\Interface;

use App\Domain\Project\Dto\Project;

interface ProjectStorageInterface
{
    public function findById(string $id): Project;

    public function findProjectDetails(string $projectId): \Generator;
}
