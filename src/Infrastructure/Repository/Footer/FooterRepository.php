<?php

namespace App\Infrastructure\Repository\Footer;

use App\Infrastructure\Entity\Footer\Footer;
use App\Infrastructure\Exception\Styles\GlobalStylesNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NoResultException;

class FooterRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Footer::class);
    }

    public function findFooter(): ?Footer
    {
        try {
            return $this->createQueryBuilder('f')
                ->orderBy('f.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GlobalStylesNotFoundException();
        }
    }
}
