<?php

namespace App\Infrastructure\Entity\Page;

use App\Infrastructure\Repository\Page\StylesRepository;
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
        private string $appBarBackground = '',
        #[ORM\Column()]
        private string $footerBackground = '',
        #[ORM\Column()]
        private string $emailBackground = '',
        #[ORM\Column]
        private string $background = '',
        #[ORM\Column]
        private string $fontFamily = '',
        #[ORM\Column]
        private string $categoryColor = '',
        #[ORM\Column]
        private string $tagColor = '',
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

    public function getAppBarBackground(): string
    {
        return $this->appBarBackground;
    }

    public function setAppBarBackground(string $appBarBackground): void
    {
        $this->appBarBackground = $appBarBackground;
    }

    public function getFooterBackground(): string
    {
        return $this->footerBackground;
    }

    public function setFooterBackground(string $footerBackground): void
    {
        $this->footerBackground = $footerBackground;
    }

    public function getEmailBackground(): string
    {
        return $this->emailBackground;
    }

    public function setEmailBackground(string $emailBackground): void
    {
        $this->emailBackground = $emailBackground;
    }

    public function getBackground(): string
    {
        return $this->background;
    }

    public function setBackground(string $background): void
    {
        $this->background = $background;
    }

    public function getFontFamily(): string
    {
        return $this->fontFamily;
    }

    public function setFontFamily(string $fontFamily): void
    {
        $this->fontFamily = $fontFamily;
    }

    public function getCategoryColor(): string
    {
        return $this->categoryColor;
    }

    public function setCategoryColor(string $categoryColor): void
    {
        $this->categoryColor = $categoryColor;
    }

    public function getTagColor(): string
    {
        return $this->tagColor;
    }

    public function setTagColor(string $tagColor): void
    {
        $this->tagColor = $tagColor;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
