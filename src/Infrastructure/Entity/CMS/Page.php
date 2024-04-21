<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\CMS\PageRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('page')]
#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    use UUIDTrait;

    #[ORM\Column(type: "string", length: 255)]
    private string $pageName;

    #[ORM\Column(type: "integer")]
    private int $pageNumber;

    #[ORM\Column(type: "boolean")]
    private bool $isPublic = true;

    #[ORM\OneToOne(targetEntity: Banner::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "banner_id", referencedColumnName: "id", nullable: true)]
    private ?Banner $banner = null;

    #[ORM\OneToOne(targetEntity: Logo::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "logo_id", referencedColumnName: "id", nullable: true)]
    private ?Logo $logo = null;

    #[ORM\ManyToMany(targetEntity: MenuItem::class, cascade: ["persist", "remove"])]
    #[ORM\JoinTable(name: "page_menu_items",
        joinColumns: [new ORM\JoinColumn(name: "page_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "menu_item_id", referencedColumnName: "id", unique: true)]
    )]
    private Collection $menuItems;

    #[ORM\ManyToMany(targetEntity: PageHeader::class, cascade: ["persist", "remove"])]
    #[ORM\JoinTable(name: "page_page_headers",
        joinColumns: [new ORM\JoinColumn(name: "page_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "page_header_id", referencedColumnName: "id", unique: true)]
    )]
    private Collection $pageHeaders;

    #[ORM\ManyToMany(targetEntity: SocialMediaLinkIcons::class, cascade: ["persist", "remove"])]
    #[ORM\JoinTable(name: "page_social_media_icons",
        joinColumns: [new ORM\JoinColumn(name: "page_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "social_media_icon_id", referencedColumnName: "id", unique: true)]
    )]
    private Collection $socialMediaIcons;

    public function __construct() {
        $this->menuItems = new ArrayCollection();
        $this->pageHeaders = new ArrayCollection();
        $this->socialMediaIcons = new ArrayCollection();
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

    public function getMenuItems(): Collection {
        return $this->menuItems;
    }

    public function addMenuItem(MenuItem $menuItem): void {
        if (!$this->menuItems->contains($menuItem)) {
            $this->menuItems[] = $menuItem;
        }
    }

    public function removeMenuItem(MenuItem $menuItem): void {
        if ($this->menuItems->removeElement($menuItem)) {
            // additional clean-up logic if necessary
        }
    }


    public function getPageHeaders(): Collection {
        return $this->pageHeaders;
    }

    public function addPageHeader(PageHeader $pageHeader): void {
        if (!$this->pageHeaders->contains($pageHeader)) {
            $this->pageHeaders[] = $pageHeader;
        }
    }

    public function removePageHeader(PageHeader $pageHeader): void {
        if ($this->pageHeaders->removeElement($pageHeader)) {
            // additional clean-up logic if necessary
        }
    }

    public function getSocialMediaIcons(): Collection {
        return $this->socialMediaIcons;
    }

    public function addSocialMediaIcons(SocialMediaLinkIcons $socialMediaLinkIcons): void {
        if (!$this->socialMediaIcons->contains($socialMediaLinkIcons)) {
            $this->socialMediaIcons[] = $socialMediaLinkIcons;
        }
    }

    public function removeSocialMediaIcons(SocialMediaLinkIcons $socialMediaLinkIcons): void {
        if ($this->socialMediaIcons->removeElement($socialMediaLinkIcons)) {
            // additional clean-up logic if necessary
        }
    }
}
