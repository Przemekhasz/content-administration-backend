<?php

namespace App\Infrastructure\DTOManager\Interface;

interface DTOManagerInterface
{
    public function convert($class, $request);

    public function validate($dto, $constraint = null);
}
