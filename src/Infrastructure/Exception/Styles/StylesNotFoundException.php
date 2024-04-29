<?php

namespace App\Infrastructure\Exception\Styles;

class StylesNotFoundException extends \Exception
{
    public function __construct(string $message = 'Styles not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
