<?php

namespace App\Domain\MenuItem;

use App\Infrastructure\Service\MenuItems\MenuItemsService;

class MenuItemsFacade
{
    public function __construct(
        private readonly MenuItemsService $menuItemsService,
    ) {
    }

    public function findAll(): \Generator
    {
        return $this->menuItemsService->findAll();
    }
}
