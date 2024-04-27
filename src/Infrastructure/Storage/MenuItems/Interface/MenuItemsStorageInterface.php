<?php

namespace App\Infrastructure\Storage\MenuItems\Interface;

interface MenuItemsStorageInterface
{
    public function findAll(): \Generator;
}
