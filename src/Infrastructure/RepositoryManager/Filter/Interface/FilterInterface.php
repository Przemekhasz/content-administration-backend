<?php

namespace App\Infrastructure\RepositoryManager\Filter\Interface;


use Doctrine\ORM\QueryBuilder;

interface FilterInterface
{
    public function apply(array $filters, QueryBuilder $qb): QueryBuilder;
}