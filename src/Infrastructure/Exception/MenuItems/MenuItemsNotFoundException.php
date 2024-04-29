<?php

namespace App\Infrastructure\Exception\MenuItems;

class MenuItemsNotFoundException extends \Exception
{
    public function __construct(string $message = 'Menu items not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
