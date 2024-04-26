<?php

namespace App\Infrastructure\Http\Factory\Page;

use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\MenuItem;
use App\Domain\Page\Dto\Page;
use App\Domain\Page\Dto\Styles;
use App\Infrastructure\Http\Dto\Page\HttpBanner;
use App\Infrastructure\Http\Dto\Page\HttpLogo;
use App\Infrastructure\Http\Dto\Page\HttpMenuItem;
use App\Infrastructure\Http\Dto\Page\HttpPage;
use App\Infrastructure\Http\Dto\Page\HttpStyles;

class PageHttpFactory
{
    public function __construct()
    {
    }

    public function createDomainObject(HttpPage $http): Page
    {
        return new Page(
            id: $http->getId(),
            pageName: $http->getPageName(),
            pageNumber: $http->getPageNumber(),
            isPublic: $http->isPublic(),
            banner: new Banner(
                id: $http->getBanner()->getId(),
                name: $http->getBanner()->getName(),
                image: $http->getBanner()->getImage(),
            ),
            logo: new Logo(
                id: $http->getLogo()->getId(),
                name: $http->getBanner()->getName(),
                logo: $http->getLogo()->getLogo(),
            ),
            menuItem: new MenuItem(
                id: $http->getMenuItem()->getId(),
                name: $http->getMenuItem()->getName(),
                url: $http->getMenuItem()->getUrl(),
            ),
            pageHeaders: $http->getPageHeaders(),
            socialMediaLinkIcons: $http->getSocialMediaLinkIcons(),
            galleries: $http->getGalleries(),
            projects: $http->getProjects(),
            styles: new Styles(
                id: $http->getStyles()->getId(),
                name: $http->getStyles()->getName(),
                appBarBackground: $http->getStyles()->getAppBarBackground(),
                footerBackground: $http->getStyles()->getFooterBackground(),
                emailBackground: $http->getStyles()->getEmailBackground(),
                background: $http->getStyles()->getBackground(),
                fontFamily: $http->getStyles()->getFontFamily(),
                categoryColor: $http->getStyles()->getCategoryColor(),
                tagColor: $http->getStyles()->getTagColor(),
            ),
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
                name: $dto->getBanner()->getName(),
                image: $dto->getBanner()->getImage(),
            ),
            logo: new HttpLogo(
                id: $dto->getLogo()->getId(),
                name: $dto->getLogo()->getName(),
                logo: $dto->getLogo()->getLogo(),
            ),
            menuItem: new HttpMenuItem(
                id: $dto->getMenuItem()->getId(),
                name: $dto->getMenuItem()->getName(),
                url: $dto->getMenuItem()->getUrl(),
            ),
            pageHeaders: $dto->getPageHeaders(),
            socialMediaLinkIcons: $dto->getSocialMediaLinkIcons(),
            galleries: $dto->getGalleries(),
            projects: $dto->getProjects(),
            styles: new HttpStyles(
                id: $dto->getStyles()->getId(),
                name: $dto->getStyles()->getName(),
                appBarBackground: $dto->getStyles()->getAppBarBackground(),
                footerBackground: $dto->getStyles()->getFooterBackground(),
                emailBackground: $dto->getStyles()->getEmailBackground(),
                background: $dto->getStyles()->getBackground(),
                fontFamily: $dto->getStyles()->getFontFamily(),
                categoryColor: $dto->getStyles()->getCategoryColor(),
                tagColor: $dto->getStyles()->getTagColor(),
            ),
        );
    }
}
