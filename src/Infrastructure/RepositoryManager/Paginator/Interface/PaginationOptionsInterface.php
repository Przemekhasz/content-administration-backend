<?php

namespace App\Infrastructure\RepositoryManager\Paginator\Interface;

interface PaginationOptionsInterface
{
    public function getOffset(): ?int;
    public function getLimit(): ?int;
}