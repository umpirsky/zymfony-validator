<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Zymfony\Component\Validator;

use Zend\Validator\ValidatorPluginManager as BaseValidatorPluginManager;

/**
 * Used to build available validators list.
 *
 * @author Саша Стаменковић <umpirsky@gmail.com>
 */
class ValidatorPluginManager extends BaseValidatorPluginManager
{
    public function getInvokableClasses()
    {
        return $this->invokableClasses;
    }
}
