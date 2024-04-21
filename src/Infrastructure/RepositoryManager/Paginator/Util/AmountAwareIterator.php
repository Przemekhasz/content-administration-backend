<?php

namespace App\Infrastructure\RepositoryManager\Paginator\Util;

use Exception;
use IteratorAggregate;
use Traversable;

class AmountAwareIterator implements IteratorAggregate
{


    /**
     * @param int|null $limit
     * @param int|null $offset
     * @param int|null $count
     * @param int|null $totalItems
     * @param Traversable|null $iterator
     */
    public function __construct(
       private readonly ?int $limit = null,
       private readonly ?int $offset = null,
       private readonly ?int $count = null,
       private readonly ?int $totalItems = null,
       private  ?Traversable $iterator = null
    )
    {

    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @return int|null
     */
    public function getTotalItems(): ?int
    {
        return $this->totalItems;
    }

    /**
     * @return Traversable|null
     */
    public function getIterator(): ?Traversable
    {
        return $this->iterator;
    }
}