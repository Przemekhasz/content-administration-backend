<?php

namespace App\Infrastructure\RepositoryManager\Interface;

use Doctrine\ORM\QueryBuilder;

interface CommandRepositoryInterface
{
    public function getName(): string;
    public function persist(EntityInterface $entity);
    public function update(EntityInterface $entity);
    public function remove(EntityInterface $entity);
}
