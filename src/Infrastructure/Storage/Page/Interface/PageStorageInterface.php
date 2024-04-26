<?php

namespace App\Infrastructure\Storage\Page\Interface;

use App\Domain\Page\Dto\Gallery;
use App\Domain\Page\Dto\Page;
use App\Domain\Page\Dto\Project;
use App\Domain\Page\Dto\Styles;

interface PageStorageInterface
{
    public function findById(string $id): Page;
    public function findAll(): \Generator;

    public function findGalleryByPageId(string $id): Page;

    public function findProjectsByPageId(string $id): Page;
    public function findStylesByPageId(string $id): Styles;
    public function findProjectByProjectId(string $projectId): Project;
    public function findGalleryById(string $galleryId): Gallery;
}
