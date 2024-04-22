<?php

namespace App\Infrastructure\Service\Page;

use App\Domain\Page\Dto\Page;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;

class PageService
{
    public function __construct(
        private readonly PageStorageInterface $pageStorage,
    ) {}

    public function findById(string $id): Page
    {
        return $this->pageStorage->findById($id);
    }
}
