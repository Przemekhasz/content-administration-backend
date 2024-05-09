<?php

namespace App\Infrastructure\Http\Factory\Project;

use App\Domain\Project\Dto\Project;
use App\Domain\User\Dto\User;
use App\Infrastructure\Http\Dto\Project\HttpProject;
use App\Infrastructure\Http\Dto\User\HttpUser;

class ProjectHttpFactory
{
    public function __construct()
    {
    }

    public function createDomainObject(HttpProject $http): Project
    {
        return new Project(
            id: $http->getId(),
            title: $http->getTitle(),
            mainDescription: $http->getMainDescription(),
            isPinned: $http->isPinned(),
            details: $http->getDetails(),
            author: new User(
                id: $http->getAuthor()->getId(),
                username: $http->getAuthor()->getUsername(),
            ),
            categories: $http->getCategories(),
            tags: $http->getTags(),
        );
    }

    public function createHttpObject(Project $dto): HttpProject
    {
        return new HttpProject(
            id: $dto->getId(),
            title: $dto->getTitle(),
            mainDescription: $dto->getMainDescription(),
            isPinned: $dto->isPinned(),
            author: new HttpUser(
                id: $dto->getAuthor()->getId(),
                username: $dto->getAuthor()->getUsername(),
            ),
            details: $dto->getDetails(),
            categories: $dto->getCategories(),
            tags: $dto->getTags(),
        );
    }
}
