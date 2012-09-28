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
class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Zymfony\Component\Validator\Exception\ClassNotFoundException
     */
    public function testValidatorDoesNotExists()
    {
        Factory::create(new Constraint(array(
            'validator' => '404'
        )));
    }

    /**
     * @expectedException Zymfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testValidatorNotZend()
    {
        Factory::create(new Constraint(array(
            'validator' => 'Symfony\Component\Validator\Constraints\LengthValidator'
        )));
    }

    public function testcreate()
    {
        $class = 'Zend\Validator\CreditCard';
        $validator = Factory::create(new Constraint(array(
            'validator' => $class
        )));

        $this->assertInstanceOf($class, $validator);
    }
}
