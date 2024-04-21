<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\PageRepository;
use App\Infrastructure\Traits\UUIDTrait;
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

    #[ORM\OneToOne(targetEntity: Contact::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "contact_id", referencedColumnName: "id", nullable: true)]
    private ?Contact $contact = null;

    #[ORM\OneToOne(targetEntity: Logo::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "logo_id", referencedColumnName: "id", nullable: true)]
    private ?Logo $logo = null;

    #[ORM\OneToOne(targetEntity: MenuItem::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "menu_item_id", referencedColumnName: "id", nullable: true)]
    private ?MenuItem $menuItem = null;

    #[ORM\OneToOne(targetEntity: PageHeader::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "page_header_id", referencedColumnName: "id", nullable: true)]
    private ?PageHeader $pageHeader = null;

    #[ORM\OneToOne(targetEntity: SocialMediaLinkIcons::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "social_media_icon_id", referencedColumnName: "id", nullable: true)]
    private ?SocialMediaLinkIcons $socialMediaIcon = null;

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

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
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

    public function getPageHeader(): ?PageHeader
    {
        return $this->pageHeader;
    }

    public function setPageHeader(?PageHeader $pageHeader): void
    {
        $this->pageHeader = $pageHeader;
    }

    public function getSocialMediaIcon(): ?SocialMediaLinkIcons
    {
        return $this->socialMediaIcon;
    }

    public function setSocialMediaIcon(?SocialMediaLinkIcons $socialMediaIcon): void
    {
        $this->socialMediaIcon = $socialMediaIcon;
    }
}
