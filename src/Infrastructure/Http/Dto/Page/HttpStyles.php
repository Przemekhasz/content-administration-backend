<?php

namespace App\Infrastructure\Http\Dto\Page;

use OpenApi\Attributes as OA;

class HttpStyles
{
    public function __construct(
        #[OA\Property]
        private ?string $id = null,
        #[OA\Property]
        private ?string $name = null,
        #[OA\Property]
        private ?string $appBarBackground = null,
        #[OA\Property]
        private ?string $footerBackground = null,
        #[OA\Property]
        private ?string $emailBackground = null,
        #[OA\Property]
        private ?string $background = null,
        #[OA\Property]
        private ?string $fontFamily = null,
        #[OA\Property]
        private ?string $categoryColor = null,
        #[OA\Property]
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
