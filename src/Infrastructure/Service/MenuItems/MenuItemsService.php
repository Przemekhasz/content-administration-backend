<?php

namespace App\Infrastructure\Service\MenuItems;

use App\Infrastructure\Storage\MenuItems\Interface\MenuItemsStorageInterface;

class MenuItemsService
{
    public function __construct(
        private readonly MenuItemsStorageInterface $menuItemsStorage,
    ) {
    }

    public function findAll(): \Generator
    {
        return $this->menuItemsStorage->findAll();
    }
}
