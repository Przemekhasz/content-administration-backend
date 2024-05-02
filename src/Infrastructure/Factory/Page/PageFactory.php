<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\MenuItem\Dto\MenuItem;
use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\Page;
use App\Domain\Styles\Dto\GlobalStyles;
use App\Domain\Styles\Dto\Styles;
use App\Infrastructure\Entity\Gallery\Gallery as GalleryEntity;
use App\Infrastructure\Entity\Page\Page as PageEntity;
use App\Infrastructure\Entity\Page\PageHeader as PageHeaderEntity;
use App\Infrastructure\Entity\Page\SocialMediaLinkIcons as SocialMediaLinkIconsEntity;
use App\Infrastructure\Entity\Project\Project as ProjectEntity;
use App\Infrastructure\Factory\gallery\GalleryFactory;
use App\Infrastructure\Factory\Project\ProjectFactory;

class PageFactory
{
    public function __construct(
        private readonly ?string $imgUploadsDir,
        private readonly GalleryFactory $galleryFactory,
        private readonly ProjectFactory $projectFactory,
        private readonly PageHeadersFactory $pageHeadersFactory,
        private readonly SocialMediaLinkIconsFactory $socialMediaLinkIconsFactory,
    ) {
    }

    public function createFromEntity(PageEntity $entity): Page
    {
        return new Page(
            id: $entity->getId(),
            pageName: $entity->getPageName(),
            pageNumber: $entity->getPageNumber(),
            isPublic: $entity->isPublic(),
            banner: new Banner(
                id: $entity->getBanner()->getId(),
                name: $entity->getBanner()->getName(),
                image: sprintf('%s/%s', $this->imgUploadsDir, $entity->getBanner()->getImage()),
            ),
            logo: new Logo(
                id: $entity->getLogo()->getId(),
                name: $entity->getLogo()->getName(),
                logo: sprintf('%s/%s', $this->imgUploadsDir, $entity->getLogo()->getLogo()),
            ),
            menuItem: new MenuItem(
                id: $entity->getMenuItem()->getId(),
                name: $entity->getMenuItem()->getName(),
                url: $entity->getMenuItem()->getUrl(),
            ),
            pageHeaders: array_map(fn (PageHeaderEntity $pageHeaderEntity) => $this->pageHeadersFactory->createFromEntity($pageHeaderEntity),
                $entity->getPageHeaders()->toArray()
            ),
            socialMediaLinkIcons: array_map(fn (SocialMediaLinkIconsEntity $socialMediaLinkIconsEntity) => $this->socialMediaLinkIconsFactory->createFromEntity($socialMediaLinkIconsEntity),
                $entity->getSocialMediaIcons()->toArray()
            ),
            galleries: array_map(fn (GalleryEntity $galleryEntity) => $this->galleryFactory->createFromEntity($galleryEntity),
                $entity->getGalleries()->toArray()
            ),
            projects: array_map(fn (ProjectEntity $projectEntity) => $this->projectFactory->createFromEntity($projectEntity),
                $entity->getProjects()->toArray()
            ),
            globalStyles: new GlobalStyles(
                id: $entity->getGlobalStyles()->getId(),
                name: $entity->getGlobalStyles()->getName(),
                primaryColor: $entity->getGlobalStyles()->getPrimaryColor(),
                secondaryColor: $entity->getGlobalStyles()->getSecondaryColor(),
                backgroundColor: $entity->getGlobalStyles()->getBackgroundColor(),
                categoriesBackgroundColor: $entity->getGlobalStyles()->getCategoriesBackgroundColor(),
                tagsBackgroundColor: $entity->getGlobalStyles()->getTagsBackgroundColor(),
                categoriesColor: $entity->getGlobalStyles()->getCategoriesColor(),
                tagsColor: $entity->getGlobalStyles()->getTagsColor(),
                textColor: $entity->getGlobalStyles()->getTextColor(),
                bannerTextBold: $entity->getGlobalStyles()->isBannerTextBold(),
                bannerTextShadow: $entity->getGlobalStyles()->isBannerTextShadow(),
                bannerTextAnimation: $entity->getGlobalStyles()->isBannerTextAnimation(),
                bannerTextFontFamily: $entity->getGlobalStyles()->getBannerTextFontFamily(),
                bannerTextShadowColor: $entity->getGlobalStyles()->getBannerTextShadowColor(),
                linkColor: $entity->getGlobalStyles()->getLinkColor(),
                hoverColor: $entity->getGlobalStyles()->getHoverColor(),
                headingFont: $entity->getGlobalStyles()->getHeadingFont(),
                bodyFont: $entity->getGlobalStyles()->getBodyFont(),
            ),
            styles: new Styles(
                id: $entity->getStyles()?->getId(),
                name: $entity->getStyles()?->getName(),
                primaryColor: $entity->getStyles()?->getPrimaryColor(),
                secondaryColor: $entity->getStyles()?->getSecondaryColor(),
                backgroundColor: $entity->getStyles()?->getBackgroundColor(),
                categoriesBackgroundColor: $entity->getStyles()?->getCategoriesBackgroundColor(),
                tagsBackgroundColor: $entity->getStyles()?->getTagsBackgroundColor(),
                categoriesColor: $entity->getStyles()?->getCategoriesColor(),
                tagsColor: $entity->getStyles()?->getTagsColor(),
                textColor: $entity->getStyles()?->getTextColor(),
                bannerTextBold: $entity->getStyles()?->isBannerTextBold(),
                bannerTextShadow: $entity->getStyles()?->isBannerTextShadow(),
                bannerTextAnimation: $entity->getStyles()?->isBannerTextAnimation(),
                bannerTextFontFamily: $entity->getStyles()?->getBannerTextFontFamily(),
                bannerTextShadowColor: $entity->getStyles()?->getBannerTextShadowColor(),
                linkColor: $entity->getStyles()?->getLinkColor(),
                hoverColor: $entity->getStyles()?->getHoverColor(),
                headingFont: $entity->getStyles()?->getHeadingFont(),
                bodyFont: $entity->getStyles()?->getBodyFont(),
            ),
        );
    }
}
