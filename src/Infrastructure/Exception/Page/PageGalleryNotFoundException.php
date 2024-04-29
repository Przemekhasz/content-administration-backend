<?php

namespace App\Infrastructure\Exception\Page;

class PageGalleryNotFoundException extends \Exception
{
    public function __construct(string $message = 'Page gallery not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
