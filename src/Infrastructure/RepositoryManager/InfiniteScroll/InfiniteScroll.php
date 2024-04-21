<?php

namespace App\Infrastructure\RepositoryManager\InfiniteScroll;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\QueryBuilder;

class InfiniteScroll
{
    public function __construct()
    {
    }

    public function Fetch(QueryBuilder $qb, InfiniteScrollOptions $options): QueryBuilder
    {
        return $qb
            ->setFirstResult($options->start)
            ->setMaxResults($options->limit);
    }
}
