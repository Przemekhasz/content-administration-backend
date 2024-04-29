<?php

namespace App\Infrastructure\Exception\Page;

class PageHeaderNotFoundException extends \Exception
{
    public function __construct(string $message = 'Page header not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
