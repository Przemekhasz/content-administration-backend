<?php

namespace App\Infrastructure\Api\Interface;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

interface ApiInterface
{
    public function setConverter(NameConverterInterface $converter): self;

    public function setGroups(array $groups): self;

    public function setIgnored(array $ignored): self;

    public function setStatus(int $status): self;

    public function json(mixed $object, int $status = 200): JsonResponse;

    public function throwException(\Exception $exception): JsonResponse;
}
