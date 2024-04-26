<?php

namespace App\Application\Page;

use App\Domain\Page\Dto\Gallery;
use App\Domain\Page\Dto\Page;
use App\Domain\Page\Dto\Project;
use App\Domain\Page\Dto\Styles;
use App\Domain\Page\PageFacade;
use App\Infrastructure\Http\Dto\Page\HttpPage;
use App\Infrastructure\Http\Factory\Page\PageHttpFactory;
use Doctrine\Common\Collections\Collection;

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

    public function findGalleryByPageId(string $id): ?Collection
    {
        return $this->pageFacade->findGalleryByPageId($id)->getGalleries();
    }

    public function findProjectsByPageId(string $id): ?Collection
    {
        return $this->pageFacade->findProjectsByPageId($id)->getProjects();
    }

    public function findStylesByPageId(string $id): Styles
    {
        return $this->pageFacade->findStylesByPageId($id);
    }

    public function findProjectByProjectId(string $projectId): Project
    {
        return $this->pageFacade->findProjectByProjectId($projectId);
    }

    public function findGalleryById(string $galleryId): Gallery
    {
        return $this->pageFacade->findGalleryById($galleryId);
    }
}
