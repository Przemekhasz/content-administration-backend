<?php

namespace App\Infrastructure\Entity\Page;

use App\Infrastructure\Repository\Page\BodyTextRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('body_text')]
#[ORM\Entity(repositoryClass: BodyTextRepository::class)]
class BodyText
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column(nullable: true)]
        private ?string $heading = '',
        #[ORM\Column(nullable: true)]
        private ?string $body = '',
    ) {
    }

    public function getHeading(): ?string
    {
        return $this->heading;
    }

    public function setHeading(?string $heading): void
    {
        $this->heading = $heading;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    public function __toString(): string
    {
        return $this->heading;
    }
}
