<?php

namespace App\Infrastructure\Entity\Page;

use App\Infrastructure\Repository\Page\LogoRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('logo')]
#[ORM\Entity(repositoryClass: LogoRepository::class)]
class Logo
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column(nullable: true)]
        private string $name = "",
        #[ORM\Column]
        private string $logo = "",
    ) {
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
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
