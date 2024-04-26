<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Styles;
use App\Infrastructure\Entity\Page\Styles as StylesEntity;

class StylesFactory
{
    public function createFromEntity(StylesEntity $entity): Styles
    {
        return new Styles(
            id: $entity->getId(),
            name: $entity->getName(),
            appBarBackground: $entity->getAppBarBackground(),
            footerBackground: $entity->getFooterBackground(),
            emailBackground: $entity->getEmailBackground(),
            background: $entity->getBackground(),
            fontFamily: $entity->getFontFamily(),
            categoryColor: $entity->getCategoryColor(),
            tagColor: $entity->getTagColor(),
        );
    }
}
