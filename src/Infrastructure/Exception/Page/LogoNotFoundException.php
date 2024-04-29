<?php

namespace App\Infrastructure\Exception\Page;

class LogoNotFoundException extends \Exception
{
    public function __construct(string $message = 'Logo not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
