<?php

namespace App\Infrastructure\Repository\Project;

use App\Infrastructure\Entity\Project\ProjectDetail;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ProjectDetailRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, ProjectDetail::class);
    }

    public function findByProjectId(string $id): ?array
    {
        $qb = $this->createQueryBuilder('pd')
            ->where('pd.project = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }
}
