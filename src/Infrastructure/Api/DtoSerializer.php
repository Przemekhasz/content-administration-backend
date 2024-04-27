<?php

namespace App\Infrastructure\Api;

use App\Infrastructure\Api\Interface\DtoSerializerInterface;
use App\Infrastructure\JSONApi\Exception\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DtoSerializer implements DtoSerializerInterface
{
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
    ) {
    }

    public function convert(string $class, mixed $data, array $groups = [])
    {
        $context = [];
        if (!empty($groups)) {
            $context['groups'] = $groups;
        }
        if ($data instanceof Request && !empty($data->getContent())) {
            return $this->serializer->deserialize($data->getContent(), $class, 'json', $context);
        }
        if (is_array($data)) {
            return $this->serializer->deserialize(json_encode($data), $class, 'json');
        }

        return null;
    }

    /**
     * @throws ValidationException
     */
    public function validate($dto, array $groups = [], $constraint = null): void
    {
        $violations = $this->validator->validate($dto, groups: $groups);

        if (count($violations) > 0) {
            $messages = [];
            /**
             * @var ConstraintViolationInterface $violation
             */
            foreach ($violations as $violation) {
                $messages[] = $violation->getPropertyPath().' '.$violation->getMessage();
            }
            throw new ValidationException(implode("\n", $messages));
        }
    }
}
