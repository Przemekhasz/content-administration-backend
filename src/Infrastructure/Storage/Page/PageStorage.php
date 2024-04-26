<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Page\Dto\Gallery;
use App\Domain\Page\Dto\Page;
use App\Domain\Page\Dto\Project;
use App\Domain\Page\Dto\Styles;
use App\Infrastructure\Factory\Page\GalleryFactory;
use App\Infrastructure\Factory\Page\PageFactory;
use App\Infrastructure\Factory\Page\ProjectFactory;
use App\Infrastructure\Factory\Page\StylesFactory;
use App\Infrastructure\Repository\Page\GalleryRepository;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Repository\Page\ProjectRepository;
use App\Infrastructure\Repository\Page\StylesRepository;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;
use Doctrine\ORM\NonUniqueResultException;

class PageStorage implements PageStorageInterface
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly ProjectRepository $projectRepository,
        private readonly GalleryRepository $galleryRepository,
        private readonly StylesRepository $stylesRepository,
        private readonly PageFactory $pageFactory,
        private readonly StylesFactory $stylesFactory,
        private readonly ProjectFactory $projectFactory,
        private readonly GalleryFactory $galleryFactory,
    ) {
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findById(string $id): Page
    {
        $page = $this->pageRepository->findById($id);

        return $this->pageFactory->createFromEntity($page);
    }

    public function findAll(): \Generator
    {
        $entities = $this->pageRepository->findAll();

        return $this->getGenerator($entities);
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

    /**
     * @throws NonUniqueResultException
     */
    public function findStylesByPageId(string $id): Styles
    {
        $pageStylesId = $this->pageRepository->findStylesByPageId($id)->getStyles()->getId();
        $styles = $this->stylesRepository->findById($pageStylesId);

        return $this->stylesFactory->createFromEntity($styles);
    }

    public function findProjectByProjectId(string $projectId): Project
    {
        $page = $this->projectRepository->findById($projectId);

        return $this->projectFactory->createFromEntity($page);
    }

    public function findGalleryById(string $galleryId): Gallery
    {
        $gallery = $this->galleryRepository->findById($galleryId);

        return $this->galleryFactory->createFromEntity($gallery);
    }

    private function getGenerator(array $entities): \Generator
    {
        foreach ($entities as $entity) {
            yield $this->pageFactory->createFromEntity($entity);
        }
    }
}
