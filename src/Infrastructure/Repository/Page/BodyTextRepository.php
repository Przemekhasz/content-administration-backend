<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\BodyText;
use App\Infrastructure\Exception\Page\PageProjectNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NoResultException;

class BodyTextRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, BodyText::class);
    }

    public function findBodyTextsByPageId(string $pageId): ?BodyText
    {
        try {
            return $this->createQueryBuilder('bt')
                ->select('bt')
                ->where('bt.id = :id')
                ->setParameter('id', $pageId)
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new PageProjectNotFoundException();
        }
    }
}
