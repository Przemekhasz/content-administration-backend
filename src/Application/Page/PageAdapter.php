<?php

namespace App\Application\Page;

use App\Domain\Page\PageFacade;
use App\Infrastructure\Http\Dto\Page\HttpPage;
use App\Infrastructure\Http\Factory\Page\PageHttpFactory;

class PageAdapter
{
    public function __construct(
        private readonly PageFacade $pageFacade,
        private readonly PageHttpFactory $pageHttpFactory,
    ) {}

    public function findById(string $id): HttpPage
    {
        $page = $this->pageFacade->findById($id);
        return $this->pageHttpFactory->createHttpObject($page);
    }
}
