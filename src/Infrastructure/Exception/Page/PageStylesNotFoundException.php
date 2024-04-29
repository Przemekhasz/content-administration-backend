<?php

namespace App\Infrastructure\Exception\Page;

class PageStylesNotFoundException extends \Exception
{
    public function __construct(string $message = 'Page styles not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
