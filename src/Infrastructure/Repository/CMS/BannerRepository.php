<?php

namespace App\Infrastructure\Repository\CMS;

use App\Infrastructure\Entity\CMS\Banner;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class BannerRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Banner::class);
    }
}
