<?php

namespace App\Infrastructure\Entity\Project;

use App\Infrastructure\Repository\Project\ProjectDetailRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectDetailRepository::class)]
#[ORM\Table(name: 'project_details')]
class ProjectDetail
{
    use UUIDTrait;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'details')]
    private ?Project $project = null;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'string', length: 255)]
    private string $imagePath;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): void
    {
        $this->project = $project;
    }

    public function __toString(): string
    {
        return $this->description;
    }
}
