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

/**
 * @author Саша Стаменковић <umpirsky@gmail.com>
 */
class ConstraintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Symfony\Component\Validator\Exception\MissingOptionsException
     */
    public function testValidatorRequired()
    {
        new Constraint();
    }

    public function testSetValidator()
    {
        $validator = 'CreditCard';
        $constraint = new Constraint(array(
            'validator' => $validator
        ));

        $this->assertEquals($validator, $constraint->validator);
    }
}
