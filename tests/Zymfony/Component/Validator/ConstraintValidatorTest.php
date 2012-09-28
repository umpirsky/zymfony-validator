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

    /**
     * @dataProvider testValidValueDataProvider
     */
    public function testValidValue($validator, $options, $value)
    {
        $this->context
            ->expects($this->never())
            ->method('addViolation')
        ;

        $this->validator->validate(
            $value,
            new Constraint(array(
                'validator' => $validator,
                'options'   => $options
            ))
        );
    }

    public function testValidValueDataProvider()
    {
        return array(
            array(
                'Zend\Validator\StringLength',
                array('min' => 3, 'max' => 5),
                'four'
            ),
            array(
                'Zend\Validator\CreditCard',
                array(),
                '378282246310005'
            ),
        );
    }

    /**
     * @dataProvider testInvalidValueDataProvider
     */
    public function testInvalidValue($validator, $options, $value, $message)
    {
        $this->context
            ->expects($this->once())
            ->method('addViolation')
            ->with(
                $message,
                $this->identicalTo(array()),
                $this->identicalTo($value)
            );
        ;

        $this->validator->validate(
            $value,
            new Constraint(array(
                'validator' => $validator,
                'options'   => $options
            ))
        );
    }

    public function testInvalidValueDataProvider()
    {
        return array(
            array(
                'Zend\Validator\StringLength',
                array('min' => 3, 'max' => 5),
                'loooooooooooooooooong',
                'The input is more than 5 characters long'
            ),
            array(
                'Zend\Validator\CreditCard',
                array(),
                'foo',
                'The input must contain only digits'
            ),
            array(
                'Zend\Validator\CreditCard',
                array(),
                '1234',
                'The input is not from an allowed institute'
            ),
        );
    }
}
