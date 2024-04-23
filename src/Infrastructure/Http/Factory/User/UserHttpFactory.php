<?php

namespace App\Infrastructure\Http\Factory\User;

use App\Domain\User\Dto\User;
use App\Infrastructure\Http\Dto\User\HttpUser;

class UserHttpFactory
{
    public function __construct()
    {
    }

    public function createDomainObject(HttpUser $http): User
    {
        return new User(
            id: $http->getId(),
            username: $http->getUsername(),
        );
    }

    public function createHttpObject(User $dto): HttpUser
    {
        return new HttpUser(
            id: $dto->getId(),
            username: $dto->getUsername(),
        );
    }
}
