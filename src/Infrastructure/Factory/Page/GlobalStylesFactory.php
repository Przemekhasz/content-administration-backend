<?php

namespace App\Infrastructure\Factory\Page;


use App\Domain\Styles\Dto\GlobalStyles;
use App\Infrastructure\Entity\Styles\GlobalStyles as GlobalStylesEntity;

class GlobalStylesFactory
{
    public function createFromEntity(GlobalStylesEntity $entity): GlobalStyles
    {
        return new GlobalStyles(
            id: $entity->getId(),
            name: $entity->getName(),
            primaryColor: $entity->getPrimaryColor(),
            secondaryColor: $entity->getSecondaryColor(),
            backgroundColor: $entity->getBackgroundColor(),
            categoriesBackgroundColor: $entity->getCategoriesBackgroundColor(),
            tagsBackgroundColor: $entity->getTagsBackgroundColor(),
            categoriesColor: $entity->getCategoriesColor(),
            tagsColor: $entity->getTagsColor(),
            textColor: $entity->getTextColor(),
            bannerTextBold: $entity->isBannerTextBold(),
            bannerTextShadow: $entity->isBannerTextShadow(),
            bannerTextAnimation: $entity->isBannerTextAnimation(),
            bannerTextFontFamily: $entity->getBannerTextFontFamily(),
            bannerTextShadowColor: $entity->getBannerTextShadowColor(),
            linkColor: $entity->getLinkColor(),
            hoverColor: $entity->getHoverColor(),
            headingFont: $entity->getHeadingFont(),
            bodyFont: $entity->getBodyFont(),
        );
    }
}
