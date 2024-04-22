<?php

namespace App\Infrastructure\Http\Factory\Page;

use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\Page;
use App\Infrastructure\Http\Dto\Page\HttpBanner;
use App\Infrastructure\Http\Dto\Page\HttpLogo;
use App\Infrastructure\Http\Dto\Page\HttpPage;

class PageHttpFactory
{
    public function __construct() {}

    public function createDomainObject(HttpPage $http): Page
    {
        return new Page(
            id: $http->getId(),
            pageName: $http->getPageName(),
            pageNumber: $http->getPageNumber(),
            isPublic: $http->isPublic(),
            banner: new Banner(
                id: $http->getBanner()->getId(),
                image: $http->getBanner()->getImage(),
            ),
            logo: new Logo(
                id: $http->getLogo()->getId(),
                logo: $http->getLogo()->getLogo(),
            ),
            menuItems: $http->getMenuItems(),
            pageHeaders: $http->getPageHeaders(),
            socialMediaLinkIcons: $http->getSocialMediaLinkIcons(),
        );
    }

    public function createHttpObject(Page $dto): HttpPage
    {
        return new HttpPage(
            id: $dto->getId(),
            pageName: $dto->getPageName(),
            pageNumber: $dto->getPageNumber(),
            isPublic: $dto->isPublic(),
            banner: new HttpBanner(
                id: $dto->getBanner()->getId(),
                image: $dto->getBanner()->getImage(),
            ),
            logo: new HttpLogo(
                id: $dto->getLogo()->getId(),
                logo: $dto->getLogo()->getLogo(),
            ),
            menuItems: $dto->getMenuItems(),
            pageHeaders: $dto->getPageHeaders(),
            socialMediaLinkIcons: $dto->getSocialMediaLinkIcons(),
        );
    }
}
