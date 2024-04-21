<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\PageHeaderRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('page_header')]
#[ORM\Entity(repositoryClass: PageHeaderRepository::class)]
class PageHeader
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column]
        private string $name = "",
        #[ORM\Column(nullable: true)]
        private bool $isMain = false,
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

    public function isMain(): bool
    {
        return $this->isMain;
    }

    public function setIsMain(bool $isMain): void
    {
        $this->isMain = $isMain;
    }
}
