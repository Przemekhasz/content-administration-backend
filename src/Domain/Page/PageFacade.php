<?php

namespace App\Domain\Page;

use App\Domain\Page\Dto\Page;
use App\Infrastructure\Service\Page\PageService;

class PageFacade
{
    public function __construct(
        private readonly PageService $pageService,
    ) {}

    public function findById(string $id): Page
    {
        return $this->pageService->findById($id);
    }

    public function findGalleryByPageId(string $id): Page
    {
        return $this->pageService->findGalleryByPageId($id);
    }
}
