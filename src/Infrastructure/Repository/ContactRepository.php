<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\CMS\Banner;
use App\Infrastructure\Entity\CMS\Logo;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ContactRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Logo::class);
    }
}
