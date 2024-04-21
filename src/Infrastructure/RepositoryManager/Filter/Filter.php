<?php

namespace App\Infrastructure\RepositoryManager\Filter;

use App\Infrastructure\RepositoryManager\Filter\Exception\FilterQueryException;
use App\Infrastructure\RepositoryManager\Filter\Interface\FilterInterface;
use App\Infrastructure\RepositoryManager\Filter\Interface\FilterStrategyInterface;
use Doctrine\ORM\QueryBuilder;

class Filter implements FilterInterface
{
    private QueryBuilder $queryBuilder;
    public function __construct()
    {
    }

    /**
     * @param array $filters
     * @param QueryBuilder $qb
     * @return QueryBuilder
     */
    public function apply(array $filters, QueryBuilder $qb): QueryBuilder
    {
        foreach ($filters as $filter) {
            if ($filter instanceof FilterStrategyInterface) {
                $filter->apply($qb);
            }
        }

        return $qb;
    }
}
