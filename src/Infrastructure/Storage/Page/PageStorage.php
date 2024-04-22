<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Page\Dto\Page;
use App\Infrastructure\Factory\Page\PageFactory;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;

class PageStorage implements PageStorageInterface
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly PageFactory $pageFactory,
    )
    {
    }

    public function findById(string $id): Page
    {
        $page = $this->pageRepository->findById($id);
        return $this->pageFactory->createFromEntity($page);
    }

    public function findGalleryByPageId(string $id): Page
    {
        $page = $this->pageRepository->findPageWithGalleries($id);
        return $this->pageFactory->createFromEntity($page);
    }
}
