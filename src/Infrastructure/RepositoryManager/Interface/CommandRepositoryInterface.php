<?php

namespace App\Infrastructure\RepositoryManager\Interface;

interface CommandRepositoryInterface
{
    public function getName(): string;

    public function persist(EntityInterface $entity);

    public function update(EntityInterface $entity);

    public function remove(EntityInterface $entity);
}
