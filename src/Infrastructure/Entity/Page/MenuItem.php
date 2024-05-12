<?php

namespace App\Infrastructure\Entity\Page;

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
        private string $name = '',
        #[ORM\Column]
        private string $url = '',
        #[ORM\Column(unique: true, nullable: true)]
        private int $position = 0,
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

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
