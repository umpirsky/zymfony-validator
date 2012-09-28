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

use Zend\Validator\AbstractValidator;

/**
 * Zend validator factory.
 *
 * @author Саша Стаменковић <umpirsky@gmail.com>
 */
class Factory
{
    /**
     * Creates Zend validator based on constrint.
     *
     * @param Constraint $constraint
     *
     * @return AbstractValidator
     */
    public static function create(Constraint $constraint)
    {
        if (!class_exists($constraint->validator)) {
            throw new Exception\ClassNotFoundException($constraint->validator);
        }

        $validator = new $constraint->validator($constraint->options);
        if (!$validator instanceof AbstractValidator) {
            throw new Exception\UnexpectedTypeException($constraint->validator, 'Zend\Validator\AbstractValidator');
        }

        return $validator;
    }
}
