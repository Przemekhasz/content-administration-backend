<?php

namespace App\Infrastructure\Entity\Page;

use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('page')]
#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    use UUIDTrait;

    #[ORM\Column(type: 'string', length: 255)]
    private string $pageName;

    #[ORM\Column(type: 'integer')]
    private int $pageNumber;

    #[ORM\Column(type: 'boolean')]
    private bool $isPublic = true;

    #[ORM\ManyToOne(targetEntity: Banner::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'banner_id', referencedColumnName: 'id', nullable: true)]
    private ?Banner $banner = null;

    #[ORM\ManyToOne(targetEntity: Logo::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'logo_id', referencedColumnName: 'id', nullable: true)]
    private ?Logo $logo = null;

    #[ORM\OneToOne(targetEntity: MenuItem::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'menu_item_id', referencedColumnName: 'id', nullable: true)]
    private ?MenuItem $menuItem = null;

    #[ORM\ManyToMany(targetEntity: PageHeader::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinTable(name: 'page_page_headers',
        joinColumns: [new ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'page_header_id', referencedColumnName: 'id', unique: false)]
    )]
    private Collection $pageHeaders;

    #[ORM\ManyToMany(targetEntity: SocialMediaLinkIcons::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinTable(name: 'page_social_media_icons',
        joinColumns: [new ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'social_media_icon_id', referencedColumnName: 'id', unique: false)]
    )]
    private Collection $socialMediaIcons;

    #[ORM\ManyToMany(targetEntity: Gallery::class, cascade: ['persist'])]
    #[ORM\JoinTable(name: 'page_galleries')]
    private Collection $galleries;

    #[ORM\ManyToMany(targetEntity: Project::class, cascade: ['persist'])]
    #[ORM\JoinTable(name: 'page_projects')]
    private Collection $projects;

    public function __construct()
    {
        $this->pageHeaders = new ArrayCollection();
        $this->socialMediaIcons = new ArrayCollection();
        $this->galleries = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }

    public function getPageName(): string
    {
        return $this->pageName;
    }

    public function setPageName(string $pageName): void
    {
        $this->pageName = $pageName;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function setPageNumber(int $pageNumber): void
    {
        $this->pageNumber = $pageNumber;
    }

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): void
    {
        $this->isPublic = $isPublic;
    }

    public function getBanner(): ?Banner
    {
        return $this->banner;
    }

    public function setBanner(?Banner $banner): void
    {
        $this->banner = $banner;
    }

    public function getLogo(): ?Logo
    {
        return $this->logo;
    }

    public function setLogo(?Logo $logo): void
    {
        $this->logo = $logo;
    }

    public function getMenuItem(): ?MenuItem
    {
        return $this->menuItem;
    }

    public function setMenuItem(?MenuItem $menuItem): void
    {
        $this->menuItem = $menuItem;
    }

    public function getPageHeaders(): Collection
    {
        return $this->pageHeaders;
    }

    public function addPageHeader(PageHeader $pageHeader): void
    {
        if (!$this->pageHeaders->contains($pageHeader)) {
            $this->pageHeaders[] = $pageHeader;
        }
    }

    public function removePageHeader(PageHeader $pageHeader): void
    {
        if ($this->pageHeaders->removeElement($pageHeader)) {
            // additional clean-up logic if necessary
        }
    }

    public function getSocialMediaIcons(): Collection
    {
        return $this->socialMediaIcons;
    }

    public function addSocialMediaIcons(SocialMediaLinkIcons $socialMediaLinkIcons): void
    {
        if (!$this->socialMediaIcons->contains($socialMediaLinkIcons)) {
            $this->socialMediaIcons[] = $socialMediaLinkIcons;
        }
    }

    public function removeSocialMediaIcons(SocialMediaLinkIcons $socialMediaLinkIcons): void
    {
        if ($this->socialMediaIcons->removeElement($socialMediaLinkIcons)) {
            // additional clean-up logic if necessary
        }
    }

    public function getGalleries(): Collection
    {
        return $this->galleries;
    }

    public function addGallery(Gallery $gallery): void
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries[] = $gallery;
        }
    }

    public function removeGallery(Gallery $gallery): void
    {
        $this->galleries->removeElement($gallery);
    }

    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): void
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
        }
    }

    public function removeProject(Project $project): void
    {
        $this->projects->removeElement($project);
    }
}
