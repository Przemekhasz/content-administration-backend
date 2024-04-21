<?php

namespace App\Infrastructure\RepositoryManager\Paginator\Interface;

use App\Infrastructure\Pagination\Pagination;
use App\Infrastructure\Pagination\PaginationInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

interface PaginationManagerInterface
{
    public function paginate(QueryBuilder $qb, PaginationInterface $pagination): Paginator;
}