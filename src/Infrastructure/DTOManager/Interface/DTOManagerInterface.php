<?php

namespace App\Infrastructure\DTOManager\Interface;

use Symfony\Component\HttpFoundation\JsonResponse;

interface DTOManagerInterface
{
    public function convert($class, $request);
    public function validate($dto, $constraint = null);
}
