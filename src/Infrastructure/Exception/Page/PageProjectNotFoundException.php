<?php

namespace App\Infrastructure\Exception\Page;

class PageProjectNotFoundException extends \Exception
{
    public function __construct(string $message = 'Page project not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
