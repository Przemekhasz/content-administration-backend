<?php

namespace App\Infrastructure\Entity\Styles;

use App\Infrastructure\Repository\Styles\StylesRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('styles')]
#[ORM\Entity(repositoryClass: StylesRepository::class)]
class Styles
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column()]
        private string $name = '',
        #[ORM\Column()]
        private string $primaryColor = '',
        #[ORM\Column()]
        private string $secondaryColor = '',
        #[ORM\Column()]
        private string $backgroundColor = '',
        #[ORM\Column()]
        private string $categoriesBackgroundColor = '',
        #[ORM\Column()]
        private string $tagsBackgroundColor = '',
        #[ORM\Column()]
        private string $categoriesColor = '',
        #[ORM\Column()]
        private string $tagsColor = '',
        #[ORM\Column()]
        private string $textColor = '',
        #[ORM\Column()]
        private bool $bannerTextBold = true,
        #[ORM\Column()]
        private bool $bannerTextShadow = true,
        #[ORM\Column()]
        private bool $bannerTextAnimation = true,
        #[ORM\Column()]
        private string $bannerTextFontFamily = '',
        #[ORM\Column()]
        private string $bannerTextShadowColor = '',
        #[ORM\Column()]
        private string $linkColor = '',
        #[ORM\Column()]
        private string $hoverColor = '',
        #[ORM\Column()]
        private string $headingFont = '',
        #[ORM\Column()]
        private string $bodyFont = '',
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrimaryColor(): string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(string $primaryColor): void
    {
        $this->primaryColor = $primaryColor;
    }

    public function getSecondaryColor(): string
    {
        return $this->secondaryColor;
    }

    public function setSecondaryColor(string $secondaryColor): void
    {
        $this->secondaryColor = $secondaryColor;
    }

    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function getCategoriesBackgroundColor(): string
    {
        return $this->categoriesBackgroundColor;
    }

    public function setCategoriesBackgroundColor(string $categoriesBackgroundColor): void
    {
        $this->categoriesBackgroundColor = $categoriesBackgroundColor;
    }

    public function getTagsBackgroundColor(): string
    {
        return $this->tagsBackgroundColor;
    }

    public function setTagsBackgroundColor(string $tagsBackgroundColor): void
    {
        $this->tagsBackgroundColor = $tagsBackgroundColor;
    }

    public function getCategoriesColor(): string
    {
        return $this->categoriesColor;
    }

    public function setCategoriesColor(string $categoriesColor): void
    {
        $this->categoriesColor = $categoriesColor;
    }

    public function getTagsColor(): string
    {
        return $this->tagsColor;
    }

    public function setTagsColor(string $tagsColor): void
    {
        $this->tagsColor = $tagsColor;
    }

    public function getTextColor(): string
    {
        return $this->textColor;
    }

    public function setTextColor(string $textColor): void
    {
        $this->textColor = $textColor;
    }

    public function isBannerTextBold(): bool
    {
        return $this->bannerTextBold;
    }

    public function setBannerTextBold(bool $bannerTextBold): void
    {
        $this->bannerTextBold = $bannerTextBold;
    }

    public function isBannerTextShadow(): bool
    {
        return $this->bannerTextShadow;
    }

    public function setBannerTextShadow(bool $bannerTextShadow): void
    {
        $this->bannerTextShadow = $bannerTextShadow;
    }

    public function isBannerTextAnimation(): bool
    {
        return $this->bannerTextAnimation;
    }

    public function setBannerTextAnimation(bool $bannerTextAnimation): void
    {
        $this->bannerTextAnimation = $bannerTextAnimation;
    }

    public function getBannerTextFontFamily(): string
    {
        return $this->bannerTextFontFamily;
    }

    public function setBannerTextFontFamily(string $bannerTextFontFamily): void
    {
        $this->bannerTextFontFamily = $bannerTextFontFamily;
    }

    public function getBannerTextShadowColor(): string
    {
        return $this->bannerTextShadowColor;
    }

    public function setBannerTextShadowColor(string $bannerTextShadowColor): void
    {
        $this->bannerTextShadowColor = $bannerTextShadowColor;
    }

    public function getLinkColor(): string
    {
        return $this->linkColor;
    }

    public function setLinkColor(string $linkColor): void
    {
        $this->linkColor = $linkColor;
    }

    public function getHoverColor(): string
    {
        return $this->hoverColor;
    }

    public function setHoverColor(string $hoverColor): void
    {
        $this->hoverColor = $hoverColor;
    }

    public function getHeadingFont(): string
    {
        return $this->headingFont;
    }

    public function setHeadingFont(string $headingFont): void
    {
        $this->headingFont = $headingFont;
    }

    public function getBodyFont(): string
    {
        return $this->bodyFont;
    }

    public function setBodyFont(string $bodyFont): void
    {
        $this->bodyFont = $bodyFont;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
