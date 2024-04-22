<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\Page;
use App\Infrastructure\Entity\CMS\Page as PageEntity;

class PageFactory
{
    public function __construct() {}

    public function createFromEntity(PageEntity $entity): Page
    {
        return new Page(
            id: $entity->getId(),
            pageName: $entity->getPageName(),
            pageNumber: $entity->getPageNumber(),
            isPublic: $entity->isPublic(),
            banner: new Banner(
                id: $entity->getBanner()->getId(),
                image: $entity->getBanner()->getImage(),
            ),
            logo: new Logo(
                id: $entity->getLogo()->getId(),
                logo: $entity->getLogo()->getLogo(),
            ),
            menuItems: $entity->getMenuItems(),
            pageHeaders: $entity->getPageHeaders(),
            socialMediaLinkIcons: $entity->getSocialMediaIcons(),
        );
    }
}
