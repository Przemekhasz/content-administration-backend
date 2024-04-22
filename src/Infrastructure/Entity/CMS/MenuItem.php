<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\Page\MenuItemRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('menu_item')]
#[ORM\Entity(repositoryClass: MenuItemRepository::class)]
class MenuItem
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column]
        private string $name = "",
        #[ORM\Column]
        private string $url = "",
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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
