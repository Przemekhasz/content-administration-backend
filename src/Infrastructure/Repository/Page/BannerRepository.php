<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\Banner;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class BannerRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Banner::class);
    }
}
