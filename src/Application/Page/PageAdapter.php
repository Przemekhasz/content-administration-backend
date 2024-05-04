<?php

namespace App\Application\Page;

use App\Domain\Page\Dto\BodyText;
use App\Domain\Page\PageFacade;
use App\Domain\Styles\Dto\Styles;
use App\Infrastructure\Http\Dto\Page\HttpPage;
use App\Infrastructure\Http\Factory\Page\PageHttpFactory;

class PageAdapter
{
    public function __construct(
        private readonly PageFacade $pageFacade,
        private readonly PageHttpFactory $pageHttpFactory,
    ) {
    }

    public function findById(string $id): HttpPage
    {
        $page = $this->pageFacade->findById($id);

        return $this->pageHttpFactory->createHttpObject($page);
    }

    public function findAll(): \Generator
    {
        return $this->pageFacade->findAll();
    }

    public function findBodyTextsByPageId(string $id): \Generator|BodyText|null
    {
        return $this->pageFacade->findBodyTextsByPageId($id);
    }

    public function findGalleryByPageId(string $id): array
    {
        return $this->pageFacade->findGalleryByPageId($id)->getGalleries();
    }

    public function findProjectsByPageId(string $id): ?array
    {
        return $this->pageFacade->findProjectsByPageId($id)->getProjects();
    }

    public function findStylesByPageId(string $id): ?Styles
    {
        return $this->pageFacade->findStylesByPageId($id);
    }
}
