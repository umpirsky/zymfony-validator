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
     * Creates Zend validator.
     *
     * @param string $validator
     *
     * @return AbstractValidator
     */
    public static function create($validator)
    {
        $class = 'Zend\\Validator\\'.$validator;

        return new $class();
    }
}
