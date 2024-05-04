<?php

namespace App\Domain\Footer\Dto;

class Footer
{
    public function __construct(
        private ?string $id = null,
        private ?string $siteName = null,
        private ?string $description = null,
        private ?string $phoneNumber = null,
        private ?string $email = null,
        private ?string $followUs = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
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
}
