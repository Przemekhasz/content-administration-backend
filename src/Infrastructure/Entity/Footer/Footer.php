<?php

namespace App\Infrastructure\Entity\Footer;

use App\Infrastructure\Repository\Footer\FooterRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('footer')]
#[ORM\Entity(repositoryClass: FooterRepository::class)]
class Footer
{
    use UUIDTrait;

    public function __construct(
        #[ORM\Column(nullable: true)]
        private ?string $siteName = '',
        #[ORM\Column(nullable: true)]
        private ?string $description = '',
        #[ORM\Column(nullable: true)]
        private ?string $phoneNumber = '',
        #[ORM\Column(nullable: true)]
        private ?string $email = '',
        #[ORM\Column(nullable: true)]
        private ?string $followUs = '',
    ) {
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(?string $siteName): void
    {
        $this->siteName = $siteName;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getFollowUs(): ?string
    {
        return $this->followUs;
    }

    public function setFollowUs(?string $followUs): void
    {
        $this->followUs = $followUs;
    }

    public function __toString(): string
    {
        return $this->siteName;
    }
}
