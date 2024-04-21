<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\CMS\BannerRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('banner')]
#[ORM\Entity(repositoryClass: BannerRepository::class)]
class Banner
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column]
        private string $image = ""
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

    public function __toString(): string
    {
        return $this->image;
    }
}
