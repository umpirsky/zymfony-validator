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

    public function testCreateNoOptions()
    {
        $class = 'Zend\Validator\StringLength';
        $validator = Factory::create(new Constraint(array(
            'validator' => $class
        )));

        $this->assertInstanceOf($class, $validator);
    }

    public function testCreate()
    {
        $class = 'Zend\Validator\StringLength';
        $options = array(
            'min'      => 3,
            'max'      => 5,
            'messages' => array(
                \Zend\Validator\StringLength::INVALID   => 'Invalid cool string. Ordinary string expected.',
                \Zend\Validator\StringLength::TOO_SHORT => 'My cool string is less than %min% characters long.',
                \Zend\Validator\StringLength::TOO_LONG  => 'My cool string is more than %max% characters long.',
            )
        );

        $validator = Factory::create(new Constraint(array(
            'validator' => $class,
            'options'   => $options
        )));

        $this->assertInstanceOf($class, $validator);
        $this->assertSame($options['min'], $validator->getOption('min'));
        $this->assertSame($options['max'], $validator->getOption('max'));
        $this->assertSame($options['messages'], $validator->getMessageTemplates());
    }
}
