<?php

namespace App\Infrastructure\RepositoryManager\Paginator;

use App\Infrastructure\Pagination\Pagination;
use App\Infrastructure\Pagination\PaginationInterface;
use App\Infrastructure\RepositoryManager\Paginator\Interface\PaginationManagerInterface;
use App\Infrastructure\RepositoryManager\Paginator\Interface\PaginationOptionsInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PaginationManager implements PaginationManagerInterface
{

    public function paginate(QueryBuilder $qb, PaginationInterface $pagination = null): Paginator
    {
        $paginator = new Paginator($qb);

        if (null !== $pagination) {
            $paginator
                ->getQuery()
                ->setFirstResult(($pagination->getPage() - 1) * $pagination->getLimit())
                ->setMaxResults($pagination->getLimit());
        }

        return $paginator;
    }
}