<?php

namespace App\Infrastructure\RepositoryManager\Filter\Interface;


use Doctrine\ORM\QueryBuilder;

interface FilterStrategyInterface
{
    public function apply(QueryBuilder $queryBuilder): void;
}