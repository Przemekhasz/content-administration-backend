<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\SocialMediaLinkIcons;
use App\Infrastructure\Entity\Page\SocialMediaLinkIcons as SocialMediaLinkIconsEntity;

class SocialMediaLinkIconsFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(SocialMediaLinkIconsEntity $entity): SocialMediaLinkIcons
    {
        return new SocialMediaLinkIcons(
            id: $entity->getId(),
            name: $entity->getName(),
            url: $entity->getUrl()
        );
    }
}
