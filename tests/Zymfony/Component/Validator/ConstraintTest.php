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
    public function testSetClass()
    {
        $constraint = new Constraint(array(
            'class' => 'foo',
        ));

        $this->assertEquals('foo', $constraint->class);
    }
}
