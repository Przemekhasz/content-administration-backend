<?php

namespace App\Infrastructure\Factory\Footer;

use App\Domain\Footer\Dto\Footer;
use App\Infrastructure\Entity\Footer\Footer as FooterEntity;

class FooterFactory
{
    public function createFromEntity(FooterEntity $entity): Footer
    {
        return new Footer(
            id: $entity->getId(),
            siteName: $entity->getSiteName(),
            description: $entity->getDescription(),
            phoneNumber: $entity->getPhoneNumber(),
            email: $entity->getEmail(),
            followUs: $entity->getFollowUs()
        );
    }
}
