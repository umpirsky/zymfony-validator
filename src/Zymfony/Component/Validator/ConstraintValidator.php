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

use Symfony\Component\Validator\ConstraintValidator as BaseConstraintValidator;

/**
 * Symfony constraint validator adapter.
 *
 * @author Саша Стаменковић <umpirsky@gmail.com>
 */
class ConstraintValidator extends BaseConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
    }
}
