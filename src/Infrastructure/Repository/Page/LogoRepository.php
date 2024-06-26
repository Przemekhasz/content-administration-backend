<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\Logo;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class LogoRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Logo::class);
    }
}
