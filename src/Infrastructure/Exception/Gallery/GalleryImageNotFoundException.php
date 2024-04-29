<?php

namespace App\Infrastructure\Exception\Gallery;

class GalleryImageNotFoundException extends \Exception
{
    public function __construct(string $message = 'Gallery image not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
