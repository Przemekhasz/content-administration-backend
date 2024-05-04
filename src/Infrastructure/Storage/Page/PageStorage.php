<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Page\Dto\BodyText;
use App\Domain\Page\Dto\Page;
use App\Domain\Styles\Dto\Styles;
use App\Infrastructure\Exception\Page\PageGalleryNotFoundException;
use App\Infrastructure\Exception\Page\PageNotFoundException;
use App\Infrastructure\Exception\Page\PageProjectNotFoundException;
use App\Infrastructure\Exception\Page\PageStylesNotFoundException;
use App\Infrastructure\Exception\Styles\StylesNotFoundException;
use App\Infrastructure\Factory\Page\BodyTextFactory;
use App\Infrastructure\Factory\Page\PageFactory;
use App\Infrastructure\Factory\Page\StylesFactory;
use App\Infrastructure\Repository\Page\BodyTextRepository;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Repository\Styles\StylesRepository;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;
use Doctrine\ORM\NonUniqueResultException;

class PageStorage implements PageStorageInterface
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly StylesRepository $stylesRepository,
        private readonly BodyTextRepository $bodyTextRepository,
        private readonly PageFactory $pageFactory,
        private readonly StylesFactory $stylesFactory,
        private readonly BodyTextFactory $bodyTextFactory,
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
    public function findStylesByPageId(string $id): ?Styles
    {
        $pageStylesId = $this->pageRepository->findStylesByPageId($id)->getStyles()?->getId();
        if (!$pageStylesId) {
            return null;
        }
        $styles = $this->stylesRepository->findById($pageStylesId);

        return $this->stylesFactory->createFromEntity($styles);
    }

    /**
     * @param string $id
     * @return \Generator|BodyText|null
     * @throws PageGalleryNotFoundException
     * @throws PageProjectNotFoundException
     */
    public function findBodyTextsByPageId(string $id): \Generator|BodyText|null
    {
        $bodyTexts = $this->pageRepository->findBodyTextByPageId($id)->getBodyTexts();
        foreach ($bodyTexts as $bodyText) {
            $bodyTextEntity = $this->bodyTextRepository->findBodyTextsByPageId($bodyText->getId());
            yield $this->bodyTextFactory->createFromEntity($bodyTextEntity);
        }
        return null;
    }

    private function getGenerator(array $entities): \Generator
    {
        foreach ($entities as $entity) {
            yield $this->pageFactory->createFromEntity($entity);
        }
    }
}
