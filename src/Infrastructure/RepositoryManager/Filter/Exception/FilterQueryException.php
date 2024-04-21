<?php

namespace App\Infrastructure\RepositoryManager\Filter\Exception;

use Exception;
use Throwable;

class FilterQueryException extends Exception
{
    public function __construct(
        string     $message = '',
        int        $code = 500,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
