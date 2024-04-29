<?php

namespace App\Infrastructure\Exception\Page;

class TagNotFoundException extends \Exception
{
    public function __construct(string $message = 'Tag not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
