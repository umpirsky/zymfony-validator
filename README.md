Zymfony Validator [![Build Status](https://secure.travis-ci.org/umpirsky/zymfony-validator.png)](http://travis-ci.org/umpirsky/zymfony-validator)
=================

Zend validator adapter for Symfony.

## Installation

The recommended way to install Zymfony Validator is through
[composer](http://getcomposer.org).

```json
{
    "require": {
        "umpirsky/zymfony-validator": "dev-master"
    }
}
```

Examples
--------

```php
<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Zymfony\Component\Validator\Constraint;

class ZymfonyType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('credit_card_number', 'text', array(
                'constraints' => new Constraint(array(
                    'validator' => 'Zend\Validator\CreditCard',
                ))
            ));
    }
}
```
[See more examples.](https://github.com/umpirsky/Silex-Kitchen-Edition/blob/zymfony-validator/src/controllers.php#L68)

## Tests

To run the test suite, you need [PHPUnit](https://github.com/sebastianbergmann/phpunit).

    $ phpunit

## License

Zymfony Validator is licensed under the MIT license.
