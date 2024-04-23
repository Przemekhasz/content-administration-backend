<?php

namespace App\Domain\Page;

use App\Domain\Page\Dto\Page;
use App\Infrastructure\Service\Page\MenuItemsService;
use App\Infrastructure\Service\Page\PageService;

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
