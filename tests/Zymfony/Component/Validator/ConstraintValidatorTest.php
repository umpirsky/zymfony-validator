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
class ConstraintValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $validator;

    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new ConstraintValidator();
        $this->validator->initialize($this->context);
    }

    public function testValidValue()
    {
        $value = '378282246310005';

        $this->context
            ->expects($this->never())
            ->method('addViolation')
        ;

        $this->validator->validate($value, new Constraint(array('validator' => 'CreditCard')));
    }

    public function testInvalidValue()
    {
        $value = 'foo';

        $this->context
            ->expects($this->once())
            ->method('addViolation')
            ->with(
                'The input must contain only digits',
                $this->identicalTo(array(
                    '{{ value }}' => $value
                )),
                $this->identicalTo($value)
            );
        ;

        $this->validator->validate($value, new Constraint(array('validator' => 'CreditCard')));
    }
}
