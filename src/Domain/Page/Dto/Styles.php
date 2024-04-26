<?php

namespace App\Domain\Page\Dto;

class Styles
{
    public function __construct(
        private ?string $id = null,
        private ?string $name = null,
        private ?string $appBarBackground = null,
        private ?string $footerBackground = null,
        private ?string $emailBackground = null,
        private ?string $background = null,
        private ?string $fontFamily = null,
        private ?string $categoryColor = null,
        private ?string $tagColor = null,
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getAppBarBackground(): ?string
    {
        return $this->appBarBackground;
    }

    public function setAppBarBackground(?string $appBarBackground): void
    {
        $this->appBarBackground = $appBarBackground;
    }

    public function getFooterBackground(): ?string
    {
        return $this->footerBackground;
    }

    public function setFooterBackground(?string $footerBackground): void
    {
        $this->footerBackground = $footerBackground;
    }

    public function getEmailBackground(): ?string
    {
        return $this->emailBackground;
    }

    public function setEmailBackground(?string $emailBackground): void
    {
        $this->emailBackground = $emailBackground;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): void
    {
        $this->background = $background;
    }

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    public function setFontFamily(?string $fontFamily): void
    {
        $this->fontFamily = $fontFamily;
    }

    public function getCategoryColor(): ?string
    {
        return $this->categoryColor;
    }

    public function setCategoryColor(?string $categoryColor): void
    {
        $this->categoryColor = $categoryColor;
    }

    public function getTagColor(): ?string
    {
        return $this->tagColor;
    }

    public function setTagColor(?string $tagColor): void
    {
        $this->tagColor = $tagColor;
    }
}
