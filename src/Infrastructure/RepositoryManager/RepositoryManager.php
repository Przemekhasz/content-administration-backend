<?php

namespace App\Infrastructure\RepositoryManager;

use App\Infrastructure\RepositoryManager\Interface\CommandRepositoryInterface;
use App\Infrastructure\RepositoryManager\Interface\EntityInterface;
use App\Infrastructure\RepositoryManager\Interface\QueryRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;

abstract class RepositoryManager extends EntityRepository implements CommandRepositoryInterface, QueryRepositoryInterface
{
    private readonly ClassMetadata $metadata;
    public function __construct(EntityManagerInterface $em, ClassMetadata $metadata)
    {
        parent::__construct($em, $metadata);
        $this->metadata = $metadata;
    }

    public function getName(): string
    {
        return $this->metadata->getName();
    }

    public function select(string $qbName): QueryBuilder
    {
        return $this->createQueryBuilder($qbName);
    }

    public function persist(EntityInterface $entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function update(EntityInterface $entity): void
    {
        $this->getEntityManager()->flush();
    }

    public function remove(EntityInterface $entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return parent::getEntityManager();
    }
}
