<?php

namespace App\Infrastructure\Http\Dto\Page;

use App\Infrastructure\Http\Dto\MenuItem\HttpMenuItem;
use App\Infrastructure\Http\Dto\Styles\HttpGlobalStyles;
use App\Infrastructure\Http\Dto\Styles\HttpStyles;
use Doctrine\Common\Collections\Collection;
use OpenApi\Attributes as OA;

class HttpPage
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
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
        private ?array $pageHeaders = [],
        #[OA\Property]
        private ?array $socialMediaLinkIcons = [],
        #[OA\Property]
        private ?array $galleries = [],
        #[OA\Property]
        private ?array $projects = [],
        #[OA\Property]
        private ?HttpGlobalStyles $globalStyles = null,
        #[OA\Property]
        private ?HttpStyles $styles = null,
    ) {
    }

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

    public function getPageHeaders(): ?array
    {
        return $this->pageHeaders;
    }

    public function setPageHeaders(?array $pageHeaders): void
    {
        $this->pageHeaders = $pageHeaders;
    }

    public function getSocialMediaLinkIcons(): ?array
    {
        return $this->socialMediaLinkIcons;
    }

    public function setSocialMediaLinkIcons(?array $socialMediaLinkIcons): void
    {
        $this->socialMediaLinkIcons = $socialMediaLinkIcons;
    }

    public function getGalleries(): ?array
    {
        return $this->galleries;
    }

    public function setGalleries(?array $galleries): void
    {
        $this->galleries = $galleries;
    }

    public function getProjects(): ?array
    {
        return $this->projects;
    }

    public function setProjects(?Collection $projects): void
    {
        $this->projects = $projects;
    }

    public function getGlobalStyles(): ?HttpGlobalStyles
    {
        return $this->globalStyles;
    }

    public function setGlobalStyles(?HttpGlobalStyles $globalStyles): void
    {
        $this->globalStyles = $globalStyles;
    }

    public function getStyles(): ?HttpStyles
    {
        return $this->styles;
    }

    public function setStyles(?HttpStyles $styles): void
    {
        $this->styles = $styles;
    }
}
