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
     * @param string $class
     *
     * @return AbstractValidator
     */
    public static function create($class)
    {
        if (!class_exists($class)) {
            throw new \RuntimeException(sprintf('Class %s does not exists.', $class));
        }

        $validator = new $class();
        if (!$validator instanceof AbstractValidator) {
            throw new \RuntimeException(sprintf('%s is not an instance of Zend\Validator\AbstractValidator.', $class));
        }

        return $validator;
    }
}
