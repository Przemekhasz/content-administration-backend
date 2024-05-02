<?php

namespace App\Infrastructure\Exception\Page;

class BannerNotFoundException extends \Exception
{
    public function __construct(string $message = 'Banner not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
