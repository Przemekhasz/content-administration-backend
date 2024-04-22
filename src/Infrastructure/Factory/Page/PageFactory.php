<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Banner;
use App\Domain\Page\Dto\Logo;
use App\Domain\Page\Dto\MenuItem;
use App\Domain\Page\Dto\Page;
use App\Infrastructure\Entity\Page\Page as PageEntity;
use Doctrine\Common\Collections\ArrayCollection;

class PageFactory
{
    public function __construct(
        private readonly ?string $imgUploadsDir,
    ) {}

    public function createFromEntity(PageEntity $entity): Page
    {
        return new Page(
            id: $entity->getId(),
            pageName: $entity->getPageName(),
            pageNumber: $entity->getPageNumber(),
            isPublic: $entity->isPublic(),
            banner: new Banner(
                id: $entity->getBanner()->getId(),
                name: $entity->getBanner()->getName(),
                image: sprintf('%s/%s', $this->imgUploadsDir, $entity->getBanner()->getImage()),
            ),
            logo: new Logo(
                id: $entity->getLogo()->getId(),
                name: $entity->getLogo()->getName(),
                logo: sprintf('%s/%s', $this->imgUploadsDir, $entity->getLogo()->getLogo()),
            ),
            menuItem: new MenuItem(
                id: $entity->getMenuItem()->getId(),
                name: $entity->getMenuItem()->getName(),
                url: $entity->getMenuItem()->getUrl(),
            ),
            pageHeaders: $entity->getPageHeaders(),
            socialMediaLinkIcons: $entity->getSocialMediaIcons(),
            galleries: $entity->getGalleries(),
            projects: $entity->getProjects()
        );
    }
}
