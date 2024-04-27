<?php

namespace App\Infrastructure\Factory\Project;

use App\Domain\Project\Dto\ProjectDetail;
use App\Infrastructure\Entity\Project\ProjectDetail as ProjectDetailEntity;

class ProjectDetailFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(ProjectDetailEntity $entity): ProjectDetail
    {
        return new ProjectDetail(
            id: $entity->getId(),
            description: $entity->getDescription(),
            imagePath: $entity->getImagePath()
        );
    }
}
