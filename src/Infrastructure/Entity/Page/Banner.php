<?php

namespace App\Infrastructure\Entity\Page;

use App\Infrastructure\Repository\Page\BannerRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('banner')]
#[ORM\Entity(repositoryClass: BannerRepository::class)]
class Banner
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column(nullable: true)]
        private string $name = '',
        #[ORM\Column]
        private string $image = '',
    ) {
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
