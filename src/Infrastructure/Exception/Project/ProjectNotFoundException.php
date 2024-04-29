<?php

namespace App\Infrastructure\Exception\Project;

class ProjectNotFoundException extends \Exception
{
    public function __construct(string $message = 'Project not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
