<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\SocialMediaLinkIconsRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('social_media_icons')]
#[ORM\Entity(repositoryClass: SocialMediaLinkIconsRepository::class)]
class SocialMediaLinkIcons
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
}
