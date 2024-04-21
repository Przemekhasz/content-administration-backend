<?php

namespace App\Infrastructure\RepositoryManager\InfiniteScroll;

use Symfony\Component\HttpFoundation\Request;

class InfiniteScrollOptions
{
    public int $start = 0;
    public int $limit = 10;
    public function __construct(int $start = 0, int $limit = 10)
    {
        $this->start = $start;
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @param int $start
     * @return InfiniteScrollOptions
     */
    public function setStart(int $start): InfiniteScrollOptions
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return InfiniteScrollOptions
     */
    public function setLimit(int $limit): InfiniteScrollOptions
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param Request $request
     * @return InfiniteScrollOptions
     */
    public static function FromRequest(Request $request): ?InfiniteScrollOptions
    {
        $start = $request->query->get('start');
        $limit = $request->query->get('limit');

        if (is_null($start) && is_null($limit)) {
            return null;
        }
        return new InfiniteScrollOptions((int)$start, (int)$limit);
    }
}
