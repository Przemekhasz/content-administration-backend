<?php

namespace App\Domain\User\Enum;

abstract class UserRoles
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_USER = 'ROLE_USER';

    public static function AsArray(): array
    {
        return [
            self::ROLE_ADMIN => 'Administrator',
            self::ROLE_USER => 'Użytkownik',
        ];
    }
}
