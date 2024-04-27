<?php

namespace App\Application\MenuItem;

use App\Domain\MenuItem\MenuItemsFacade;

class MenuItemsAdapter
{
    public function __construct(
        private readonly MenuItemsFacade $menuItemsFacade,
    ) {
    }

    public function findAll(): \Generator
    {
        return $this->menuItemsFacade->findAll();
    }
}
