<?php

namespace App\Infrastructure\Factory\Page;


use App\Domain\MenuItem\Dto\MenuItem;
use App\Infrastructure\Entity\Page\MenuItem as MenuItemEntity;

class MenuItemsFactory
{
    public function __construct() {}

    public function createFromEntity(MenuItemEntity $entity): MenuItem
    {
        return new MenuItem(
            id: $entity->getId(),
            name: $entity->getName(),
            url: $entity->getUrl(),
        );
    }
}
