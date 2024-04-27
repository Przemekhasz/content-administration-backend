<?php

namespace App\Infrastructure\Storage\Project;

use App\Domain\Project\Dto\Project;
use App\Infrastructure\Factory\Project\ProjectDetailFactory;
use App\Infrastructure\Factory\Project\ProjectFactory;
use App\Infrastructure\Repository\Project\ProjectDetailRepository;
use App\Infrastructure\Repository\Project\ProjectRepository;
use App\Infrastructure\Storage\Project\Interface\ProjectStorageInterface;

class ProjectStorage implements ProjectStorageInterface
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
        private readonly ProjectDetailRepository $projectDetailRepository,
        private readonly ProjectFactory $projectFactory,
        private readonly ProjectDetailFactory $projectDetailFactory,
    ) {
    }

    public function findById(string $id): Project
    {
        $project = $this->projectRepository->findById($id);

        return $this->projectFactory->createFromEntity($project);
    }

    public function findProjectDetails(string $projectId): \Generator
    {
        $projectDetail = $this->projectDetailRepository->findByProjectId($projectId);

        return $this->getGenerator($projectDetail);
    }

    private function getGenerator(array $entities): \Generator
    {
        foreach ($entities as $entity) {
            yield $this->projectDetailFactory->createFromEntity($entity);
        }
    }
}
