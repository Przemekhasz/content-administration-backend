<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Gallery\Dto\Gallery;
use App\Domain\Page\Dto\Page;
use App\Domain\Project\Dto\Project;
use App\Domain\Styles\Dto\GlobalStyles;
use App\Domain\Styles\Dto\Styles;
use App\Infrastructure\Factory\gallery\GalleryFactory;
use App\Infrastructure\Factory\Page\GlobalStylesFactory;
use App\Infrastructure\Factory\Page\PageFactory;
use App\Infrastructure\Factory\Page\StylesFactory;
use App\Infrastructure\Factory\Project\ProjectFactory;
use App\Infrastructure\Repository\Gallery\GalleryRepository;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Repository\Project\ProjectRepository;
use App\Infrastructure\Repository\Styles\GlobalStylesRepository;
use App\Infrastructure\Repository\Styles\StylesRepository;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;
use Doctrine\ORM\NonUniqueResultException;

class PageStorage implements PageStorageInterface
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly ProjectRepository $projectRepository,
        private readonly GalleryRepository $galleryRepository,
        private readonly StylesRepository $stylesRepository,
        private readonly GlobalStylesRepository $globalStylesRepository,
        private readonly PageFactory $pageFactory,
        private readonly StylesFactory $stylesFactory,
        private readonly GlobalStylesFactory $globalStylesFactory,
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

    private function getGenerator(array $entities): \Generator
    {
        foreach ($entities as $entity) {
            yield $this->pageFactory->createFromEntity($entity);
        }
    }
}
