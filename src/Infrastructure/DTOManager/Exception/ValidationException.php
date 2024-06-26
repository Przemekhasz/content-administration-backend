<?php

namespace App\Infrastructure\DTOManager\Exception;

class ValidationException extends \Exception
{
    public function __construct(
        string $message = 'Wrong Dtos was passed in validator',
        int $code = 400,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
