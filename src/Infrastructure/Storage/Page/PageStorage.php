<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Page\Dto\Page;
use App\Infrastructure\Factory\Page\PageFactory;
use App\Infrastructure\Factory\Page\ProjectFactory;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Repository\Page\ProjectRepository;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;
use Doctrine\ORM\NonUniqueResultException;

class PageStorage implements PageStorageInterface
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly PageFactory $pageFactory,
        private readonly ProjectFactory $projectFactory,
        private readonly ProjectRepository $projectRepository,
    ) {
    }

    public function findById(string $id): Page
    {
        $page = $this->pageRepository->findById($id);

        return $this->pageFactory->createFromEntity($page);
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findGalleryByPageId(string $id): Page
    {
        $page = $this->pageRepository->findPageWithGalleries($id);

        return $this->pageFactory->createFromEntity($page);
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findProjectsByPageId(string $id): Page
    {
        $page = $this->pageRepository->findProjectsByPageId($id);

        return $this->pageFactory->createFromEntity($page);
    }
}
