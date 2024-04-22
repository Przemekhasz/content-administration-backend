<?php

namespace App\Infrastructure\Entity\Page;

use App\Infrastructure\Repository\Page\ProjectRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ORM\Table(name: "projects")]
class Project
{
    use UUIDTrait;

    #[ORM\Column(type: "string", length: 255)]
    private string $title;

    #[ORM\Column(type: "text")]
    private string $mainDescription;

    #[ORM\Column(type: "string", length: 255)]
    private string $author;

    #[ORM\OneToMany(targetEntity: ProjectDetail::class, mappedBy: "project", cascade: ["persist", "remove"])]
    private Collection $details;

    #[ORM\ManyToMany(targetEntity: Category::class)]
    #[ORM\JoinTable(name: 'project_categories',
        joinColumns: [new ORM\JoinColumn(name: "project_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "category_id", referencedColumnName: "id")]
    )]
    private Collection $categories;

    #[ORM\ManyToMany(targetEntity: Tag::class)]
    #[ORM\JoinTable(name: 'project_tags',
        joinColumns: [new ORM\JoinColumn(name: "project_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "tag_id", referencedColumnName: "id")]
    )]
    private Collection $tags;

    public function __construct() {
        $this->details = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getMainDescription(): string {
        return $this->mainDescription;
    }

    public function setMainDescription(string $mainDescription): void {
        $this->mainDescription = $mainDescription;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function setAuthor(string $author): void {
        $this->author = $author;
    }

    public function getDetails(): Collection {
        return $this->details;
    }

    public function addDetail(ProjectDetail $detail): void {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setProject($this);
        }
    }

    public function removeDetail(ProjectDetail $detail): void {
        if ($this->details->removeElement($detail)) {
            if ($detail->getProject() === $this) {
                $detail->setProject(null);
            }
        }
    }

    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function setCategories(Collection $categories): void
    {
        $this->categories = $categories;
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function setTags(Collection $tags): void
    {
        $this->tags = $tags;
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
