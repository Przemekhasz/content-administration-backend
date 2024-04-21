<?php

namespace App\Infrastructure\RepositoryManager\Interface;

interface QueryRepositoryInterface
{
    public function getName(): string;
    public function select(string $qbName);

}
