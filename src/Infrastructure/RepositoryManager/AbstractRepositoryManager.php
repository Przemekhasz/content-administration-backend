<?php

namespace App\Infrastructure\RepositoryManager;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;

class AbstractRepositoryManager extends EntityRepository
{
    public function __construct(EntityManagerInterface $em, string $class)
    {
        parent::__construct($em, new ClassMetadata($class));
    }

    public function select(string $qbName): QueryBuilder
    {
        return $this->createQueryBuilder($qbName);
    }

    public function persist($entity): void
    {
        $this->_em->persist($entity);
        $this->_em->flush();
    }

    public function update($entity): void
    {
        $this->_em->flush($entity);
    }

    public function remove($entity): void
    {
        $this->_em->remove($entity);
        $this->_em->flush();
    }
}
