<?php

namespace App\Infrastructure\Api\Interface;

interface DtoSerializerInterface
{
    public function convert(string $class, mixed $data, array $groups = []);

    public function validate($dto, array $groups = [], $constraint = null);
}
