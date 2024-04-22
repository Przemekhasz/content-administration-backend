<?php

namespace App\Infrastructure\DTOManager;

use App\Infrastructure\DTOManager\Exception\ValidationException;
use App\Infrastructure\DTOManager\Interface\DTOManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DTOManager implements DTOManagerInterface
{
    public function __construct(
        private readonly ValidatorInterface $validator,
        private readonly SerializerInterface $serializer
    ) {
    }

    public function convert($class, $request)
    {
        if ($request instanceof Request) {
            return $this->serializer->deserialize($request->getContent(), $class, 'json');
        }
        if (is_array($request)) {
            return $this->serializer->deserialize(json_encode($request), $class, 'json');
        }
        return new $class();
    }


    /**
     * @throws ValidationException
     */
    public function validate($dto, $constraint = null): void
    {
        $violations = $this->validator->validate($dto);

        if (count($violations) > 0) {
            $messages = [];
            foreach ($violations as $violation) {
                $messages[] = $violation->getPropertyPath() . ': ' . $violation->getMessage();
            }
            throw new ValidationException(implode("\n", $messages));
        }
    }
}
