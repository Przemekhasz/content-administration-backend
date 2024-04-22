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
        $galleriesData = new ArrayCollection();
        foreach ($entity->getGalleries() as $gallery) {
            $imagesData = new ArrayCollection();
            foreach ($gallery->getImages() as $image) {
                $imagesData->add([
                    'description' => $image->getDescription(),
                    'imagePath' => sprintf('%s/%s', $this->imgUploadsDir, $image->getImagePath()),
                ]);
            }
            $galleriesData->add([
                'name' => $gallery->getName(),
                'images' => $imagesData,
            ]);
        }

        $projectsData = new ArrayCollection();
        foreach ($entity->getProjects() as $project) {
            $detailsData = new ArrayCollection();
            foreach ($project->getDetails() as $detail) {
                $detailsData->add([
                    'description' => $detail->getDescription(),
                    'imagePath' => sprintf('%s/%s', $this->imgUploadsDir, $detail->getImagePath()),
                ]);
            }
            $projectsData->add([
                'title' => $project->getTitle(),
                'mainDescription' => $project->getMainDescription(),
                'author' => $project->getAuthor(),
                'details' => $detailsData,
            ]);
        }

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
            galleries: $galleriesData,
            projects: $projectsData
        );
    }
}
