<?php

namespace App\Infrastructure\Entity\Project;

use App\Infrastructure\Entity\Page\Category;
use App\Infrastructure\Entity\Page\Tag;
use App\Infrastructure\Entity\User\User;
use App\Infrastructure\Repository\Project\ProjectRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ORM\Table(name: 'projects')]
class Project
{
    use UUIDTrait;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'text')]
    private string $mainDescription;

    #[ORM\Column(type: 'boolean', nullable: false, options: ['default' => false])]
    private bool $isPinned = false;

    #[ORM\Column(type: 'text', nullable: true)]
    private string $status;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: ProjectDetail::class, cascade: ['persist', 'remove'])]
    private Collection $details;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'author_id', referencedColumnName: 'id', nullable: true)]
    private ?User $author = null;

    #[ORM\ManyToMany(targetEntity: Category::class)]
    #[ORM\JoinTable(name: 'project_categories',
        joinColumns: [new ORM\JoinColumn(name: 'project_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id')]
    )]
    private Collection $categories;

    #[ORM\ManyToMany(targetEntity: Tag::class)]
    #[ORM\JoinTable(name: 'project_tags',
        joinColumns: [new ORM\JoinColumn(name: 'project_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'tag_id', referencedColumnName: 'id')]
    )]
    private Collection $tags;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getMainDescription(): string
    {
        return $this->mainDescription;
    }

    public function setMainDescription(string $mainDescription): void
    {
        $this->mainDescription = $mainDescription;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function isPinned(): bool
    {
        return $this->isPinned;
    }

    public function setIsPinned(bool $isPinned): void
    {
        $this->isPinned = $isPinned;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): void
    {
        $this->author = $author;
    }

    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(ProjectDetail $detail): void
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setProject($this);
        }
    }

    public function removeDetail(ProjectDetail $detail): void
    {
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
