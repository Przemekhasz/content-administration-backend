<?php

namespace App\Domain\Page\Dto;

use App\Domain\MenuItem\Dto\MenuItem;
use App\Domain\Styles\Dto\GlobalStyles;
use App\Domain\Styles\Dto\Styles;
use Doctrine\Common\Collections\Collection;

class Page
{
    public function __construct(
        private ?string $id = null,
        private ?string $pageName = null,
        private ?int $pageNumber = null,
        private bool $isPublic = true,
        private ?Banner $banner = null,
        private ?Logo $logo = null,
        private ?MenuItem $menuItem = null,
        private ?Collection $pageHeaders = null,
        private ?Collection $socialMediaLinkIcons = null,
        private ?Collection $galleries = null,
        private ?Collection $projects = null,
        private ?GlobalStyles $globalStyles = null,
        private ?Styles $styles = null,
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

    public function getGalleries(): ?Collection
    {
        return $this->galleries;
    }

    public function setGalleries(?Collection $galleries): void
    {
        $this->galleries = $galleries;
    }

    public function getProjects(): ?Collection
    {
        return $this->projects;
    }

    public function setProjects(?Collection $projects): void
    {
        $this->projects = $projects;
    }

    public function getGlobalStyles(): ?GlobalStyles
    {
        return $this->globalStyles;
    }

    public function setGlobalStyles(?GlobalStyles $globalStyles): void
    {
        $this->globalStyles = $globalStyles;
    }

    public function getStyles(): ?Styles
    {
        return $this->styles;
    }

    public function setStyles(?Styles $styles): void
    {
        $this->styles = $styles;
    }
}
