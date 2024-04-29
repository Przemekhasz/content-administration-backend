<?php

namespace App\Infrastructure\Exception\Project;

class ProjectDetailsNotFoundException extends \Exception
{
    public function __construct(string $message = 'Project details not found', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
