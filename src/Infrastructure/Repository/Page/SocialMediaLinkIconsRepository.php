<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\SocialMediaLinkIcons;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class SocialMediaLinkIconsRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, SocialMediaLinkIcons::class);
    }
}
