<?php

namespace App\Infrastructure\Exception\Styles;

class GlobalStylesNotFoundException extends \Exception
{
    public function __construct(string $message = 'Global styles not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
