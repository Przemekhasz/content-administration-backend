<?php

namespace App\Infrastructure\RepositoryManager\Interface;

use Doctrine\ORM\QueryBuilder;

interface QueryRepositoryInterface
{
    public function getName(): string;
    public function select(string $qbName);

}
