<?php

namespace App\Infrastructure\Http\Dto\Page;

use Doctrine\Common\Collections\Collection;
use OpenApi\Attributes as OA;
use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\MenuItem;
use App\Domain\Page\Dto\PageHeader;
use App\Domain\Page\Dto\SocialMediaLinkIcons;

class HttpPage
{
    public function __construct(
        #[OA\Property]
        private ?string    $id = null,
        #[OA\Property]
        private ?string $pageName = null,
        #[OA\Property]
        private ?int $pageNumber = null,
        #[OA\Property]
        private bool $isPublic = true,
        #[OA\Property]
        private ?HttpBanner $banner = null,
        #[OA\Property]
        private ?HttpLogo $logo = null,
        #[OA\Property]
        private ?HttpMenuItem $menuItem = null,
        #[OA\Property]
        private ?Collection $pageHeaders = null,
        #[OA\Property]
        private ?Collection $socialMediaLinkIcons = null,
    ) {}

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getPageName(): ?string
    {
        return $this->pageName;
    }

    public function setPageName(?string $pageName): void
    {
        $this->pageName = $pageName;
    }

    public function getPageNumber(): ?int
    {
        return $this->pageNumber;
    }

    public function setPageNumber(?int $pageNumber): void
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

    public function getBanner(): ?HttpBanner
    {
        return $this->banner;
    }

    public function setBanner(?HttpBanner $banner): void
    {
        $this->banner = $banner;
    }

    public function getLogo(): ?HttpLogo
    {
        return $this->logo;
    }

    public function setLogo(?HttpLogo $logo): void
    {
        $this->logo = $logo;
    }

    public function getMenuItem(): ?HttpMenuItem
    {
        return $this->menuItem;
    }

    public function setMenuItem(?HttpMenuItem $menuItem): void
    {
        $this->menuItem = $menuItem;
    }

    public function getPageHeaders(): ?Collection
    {
        return $this->pageHeaders;
    }

    public function setPageHeaders(?Collection $pageHeaders): void
    {
        $this->pageHeaders = $pageHeaders;
    }

    public function getSocialMediaLinkIcons(): ?Collection
    {
        return $this->socialMediaLinkIcons;
    }

    public function setSocialMediaLinkIcons(?Collection $socialMediaLinkIcons): void
    {
        $this->socialMediaLinkIcons = $socialMediaLinkIcons;
    }
}
