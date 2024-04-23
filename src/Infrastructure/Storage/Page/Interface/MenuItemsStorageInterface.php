<?php

namespace App\Infrastructure\Storage\Page\Interface;

use App\Domain\Page\Dto\Page;

interface MenuItemsStorageInterface
{
    public function findAll(): \Generator;
}
