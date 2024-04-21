<?php

namespace App\Infrastructure\Entity\CMS;

use App\Infrastructure\Repository\CMS\CategoryRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'category')]
class Category
{
    use UUIDTrait;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

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
