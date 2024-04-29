<?php

namespace App\Infrastructure\Exception\Page;

class SocialMediaIconsNotFoundException extends \Exception
{
    public function __construct(string $message = 'Social media icons not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
