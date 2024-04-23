<?php

namespace App\Application\Page;

use App\Domain\Page\MenuItemsFacade;

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
