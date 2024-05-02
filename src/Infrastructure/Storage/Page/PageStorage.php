<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Page\Dto\Page;
use App\Domain\Styles\Dto\Styles;
use App\Infrastructure\Exception\Page\PageGalleryNotFoundException;
use App\Infrastructure\Exception\Page\PageNotFoundException;
use App\Infrastructure\Exception\Page\PageProjectNotFoundException;
use App\Infrastructure\Exception\Page\PageStylesNotFoundException;
use App\Infrastructure\Exception\Styles\StylesNotFoundException;
use App\Infrastructure\Factory\Page\PageFactory;
use App\Infrastructure\Factory\Page\StylesFactory;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Repository\Styles\StylesRepository;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;
use Doctrine\ORM\NonUniqueResultException;

class PageStorage implements PageStorageInterface
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly StylesRepository $stylesRepository,
        private readonly PageFactory $pageFactory,
        private readonly StylesFactory $stylesFactory,
    ) {
    }

    /**
     * @throws NonUniqueResultException
     * @throws ProjectNotFoundException
     * @throws PageNotFoundException
     */
    public function findById(string $id): Page
    {
        $entity = $this->pageRepository->findById($id);

        return $this->pageFactory->createFromEntity($entity);
    }

    public function findAll(): \Generator
    {
        $entities = $this->pageRepository->findAll();

        return $this->getGenerator($entities);
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageGalleryNotFoundException
     */
    public function findGalleryByPageId(string $id): Page
    {
        $page = $this->pageRepository->findPageWithGalleries($id);

        return $this->pageFactory->createFromEntity($page);
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageProjectNotFoundException
     */
    public function findProjectsByPageId(string $id): Page
    {
        $page = $this->pageRepository->findProjectsByPageId($id);

        return $this->pageFactory->createFromEntity($page);
    }

    /**
     * @throws NonUniqueResultException
     * @throws PageStylesNotFoundException
     * @throws StylesNotFoundException
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
