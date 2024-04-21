<?php

namespace App\Infrastructure\RepositoryManager\Paginator\Dto;

use Iterator;
use JsonSerializable;

class Page implements JsonSerializable
{
    private readonly int $pages;
    public function __construct(
        private int      $currentPage,
        private int      $perPage,
        private int      $count,
        private Iterator $items
    )
    {
        if ($perPage === 0) {
            $perPage = 10;
        }
        $this->perPage = $perPage;
        $this->pages = (int)ceil($count / $perPage);
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     * @return Page
     */
    public function setCurrentPage(int $currentPage): Page
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return Page
     */
    public function setPerPage(int $perPage): Page
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return Page
     */
    public function setCount(int $count): Page
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }


    /**
     * @return Iterator
     */
    public function getItems(): Iterator
    {
        return $this->items;
    }

    /**
     * @param Iterator $items
     * @return Page
     */
    public function setItems(Iterator $items): Page
    {
        $this->items = $items;
        return $this;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize(): mixed
    {
        return [
            'currentPage' => $this->currentPage,
            'perPage' => $this->perPage,
            'count' => $this->count,
            'pages' => $this->pages,
            'items' => iterator_to_array($this->items),
        ];
    }
}