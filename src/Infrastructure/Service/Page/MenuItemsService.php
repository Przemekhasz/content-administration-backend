<?php

namespace App\Infrastructure\Service\Page;

use App\Domain\Page\Dto\Page;
use App\Infrastructure\Storage\Page\Interface\MenuItemsStorageInterface;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;

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
