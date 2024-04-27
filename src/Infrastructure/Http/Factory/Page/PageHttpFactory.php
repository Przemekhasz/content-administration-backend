<?php

namespace App\Infrastructure\Http\Factory\Page;

use App\Domain\MenuItem\Dto\MenuItem;
use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\Page;
use App\Domain\Styles\Dto\GlobalStyles;
use App\Domain\Styles\Dto\Styles;
use App\Infrastructure\Http\Dto\MenuItem\HttpMenuItem;
use App\Infrastructure\Http\Dto\Page\HttpBanner;
use App\Infrastructure\Http\Dto\Page\HttpLogo;
use App\Infrastructure\Http\Dto\Page\HttpPage;
use App\Infrastructure\Http\Dto\Styles\HttpGlobalStyles;
use App\Infrastructure\Http\Dto\Styles\HttpStyles;

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
            globalStyles: new GlobalStyles(
                id: $http->getGlobalStyles()->getId(),
                name: $http->getGlobalStyles()->getName(),
                primaryColor: $http->getGlobalStyles()->getPrimaryColor(),
                secondaryColor: $http->getGlobalStyles()->getSecondaryColor(),
                backgroundColor: $http->getGlobalStyles()->getBackgroundColor(),
                categoriesBackgroundColor: $http->getGlobalStyles()->getCategoriesBackgroundColor(),
                tagsBackgroundColor: $http->getGlobalStyles()->getTagsBackgroundColor(),
                categoriesColor: $http->getGlobalStyles()->getCategoriesColor(),
                tagsColor: $http->getGlobalStyles()->getTagsColor(),
                textColor: $http->getGlobalStyles()->getTextColor(),
                bannerTextBold: $http->getGlobalStyles()->isBannerTextBold(),
                bannerTextShadow: $http->getGlobalStyles()->isBannerTextShadow(),
                bannerTextAnimation: $http->getGlobalStyles()->isBannerTextAnimation(),
                bannerTextFontFamily: $http->getGlobalStyles()->getBannerTextFontFamily(),
                bannerTextShadowColor: $http->getGlobalStyles()->getBannerTextShadowColor(),
                linkColor: $http->getGlobalStyles()->getLinkColor(),
                hoverColor: $http->getGlobalStyles()->getHoverColor(),
                headingFont: $http->getGlobalStyles()->getHeadingFont(),
                bodyFont: $http->getGlobalStyles()->getBodyFont(),
            ),
            styles: new Styles(
                id: $http->getStyles()->getId(),
                name: $http->getStyles()->getName(),
                primaryColor: $http->getStyles()->getPrimaryColor(),
                secondaryColor: $http->getStyles()->getSecondaryColor(),
                backgroundColor: $http->getStyles()->getBackgroundColor(),
                categoriesBackgroundColor: $http->getStyles()->getCategoriesBackgroundColor(),
                tagsBackgroundColor: $http->getStyles()->getTagsBackgroundColor(),
                categoriesColor: $http->getStyles()->getCategoriesColor(),
                tagsColor: $http->getStyles()->getTagsColor(),
                textColor: $http->getStyles()->getTextColor(),
                bannerTextBold: $http->getStyles()->isBannerTextBold(),
                bannerTextShadow: $http->getStyles()->isBannerTextShadow(),
                bannerTextAnimation: $http->getStyles()->isBannerTextAnimation(),
                bannerTextFontFamily: $http->getStyles()->getBannerTextFontFamily(),
                bannerTextShadowColor: $http->getStyles()->getBannerTextShadowColor(),
                linkColor: $http->getStyles()->getLinkColor(),
                hoverColor: $http->getStyles()->getHoverColor(),
                headingFont: $http->getStyles()->getHeadingFont(),
                bodyFont: $http->getStyles()->getBodyFont(),
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
            globalStyles: new HttpGlobalStyles(
                id: $dto->getGlobalStyles()->getId(),
                name: $dto->getGlobalStyles()->getName(),
                primaryColor: $dto->getGlobalStyles()->getPrimaryColor(),
                secondaryColor: $dto->getGlobalStyles()->getSecondaryColor(),
                backgroundColor: $dto->getGlobalStyles()->getBackgroundColor(),
                categoriesBackgroundColor: $dto->getGlobalStyles()->getCategoriesBackgroundColor(),
                tagsBackgroundColor: $dto->getGlobalStyles()->getTagsBackgroundColor(),
                categoriesColor: $dto->getGlobalStyles()->getCategoriesColor(),
                tagsColor: $dto->getGlobalStyles()->getTagsColor(),
                textColor: $dto->getGlobalStyles()->getTextColor(),
                bannerTextBold: $dto->getGlobalStyles()->isBannerTextBold(),
                bannerTextShadow: $dto->getGlobalStyles()->isBannerTextShadow(),
                bannerTextAnimation: $dto->getGlobalStyles()->isBannerTextAnimation(),
                bannerTextFontFamily: $dto->getGlobalStyles()->getBannerTextFontFamily(),
                bannerTextShadowColor: $dto->getGlobalStyles()->getBannerTextShadowColor(),
                linkColor: $dto->getGlobalStyles()->getLinkColor(),
                hoverColor: $dto->getGlobalStyles()->getHoverColor(),
                headingFont: $dto->getGlobalStyles()->getHeadingFont(),
                bodyFont: $dto->getGlobalStyles()->getBodyFont(),
            ),
            styles: new HttpStyles(
                id: $dto->getStyles()?->getId(),
                name: $dto->getStyles()?->getName(),
                primaryColor: $dto->getStyles()?->getPrimaryColor(),
                secondaryColor: $dto->getStyles()?->getSecondaryColor(),
                backgroundColor: $dto->getStyles()?->getBackgroundColor(),
                categoriesBackgroundColor: $dto->getStyles()?->getCategoriesBackgroundColor(),
                tagsBackgroundColor: $dto->getStyles()?->getTagsBackgroundColor(),
                categoriesColor: $dto->getStyles()?->getCategoriesColor(),
                tagsColor: $dto->getStyles()?->getTagsColor(),
                textColor: $dto->getStyles()?->getTextColor(),
                bannerTextBold: $dto->getStyles()?->getBannerTextBold(),
                bannerTextShadow: $dto->getStyles()?->getBannerTextShadow(),
                bannerTextAnimation: $dto->getStyles()?->getBannerTextAnimation(),
                bannerTextFontFamily: $dto->getStyles()?->getBannerTextFontFamily(),
                bannerTextShadowColor: $dto->getStyles()?->getBannerTextShadowColor(),
                linkColor: $dto->getStyles()?->getLinkColor(),
                hoverColor: $dto->getStyles()?->getHoverColor(),
                headingFont: $dto->getStyles()?->getHeadingFont(),
                bodyFont: $dto->getStyles()?->getBodyFont(),
            )
        );
    }
}
