<?php

namespace App\Infrastructure\DTOManager;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Validation;

class DTOValidator extends ConstraintValidator
{
    public static function Verify(mixed $value, ?Constraint $constraint = null)
    {
        $validator = new DTOValidator();
        $validator->validate($value, $constraint);
    }

    /**
     * Checks if the passed value is valid.
     */
    public function validate(mixed $value, ?Constraint $constraint = null)
    {
        $violations = Validation::createValidator()->validate($value);

        if (count($violations) > 0) {
            $violationMessages = [];
            foreach ($violations as $violation) {
                $violationMessages[] = sprintf('%s: %s', $violation->getPropertyPath(), $violation->getMessage());
            }
            throw new \InvalidArgumentException(implode('; ', $violationMessages));
        }
    }
}
