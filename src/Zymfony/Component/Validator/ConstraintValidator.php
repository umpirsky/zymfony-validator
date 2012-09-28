<?php

/**
 * This file is part of the Zymfony library.
 *
 *  (c) Саша Стаменковић <umpirsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zymfony\Component\Validator;

use Symfony\Component\Validator\ConstraintValidator as SymfonyConstraintValidator;
use Symfony\Component\Validator\Constraint as SymfonyConstraint;

/**
 * Symfony constraint validator adapter.
 *
 * @author Саша Стаменковић <umpirsky@gmail.com>
 */
class ConstraintValidator extends SymfonyConstraintValidator
{
    /**
     * {@inheritDoc}
     */
    public function validate($value, SymfonyConstraint $constraint)
    {
        $validator = Factory::create($constraint);

        if ($validator->isValid($value)) {
            return;
        }

        $this->context->addViolation(
            array_pop($validator->getMessages()),
            array('{{ value }}' => $value),
            $value
        );
    }
}
