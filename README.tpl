Zymfony Validator [![Build Status](https://secure.travis-ci.org/umpirsky/zymfony-validator.png)](http://travis-ci.org/umpirsky/zymfony-validator)
=================

Zend validator adapter for Symfony.

Zend Framework comes with a nice set of validation classes. Symfony provides nice validator component as well, but lacks some validators Zend already have like credit card, post code, hostname, iban...

Zymfony Validator is a bridge between this two validators, and provides Symfonic interfaece for Zend validators.

## Installation

The recommended way to install Zymfony Validator is through
[composer](http://getcomposer.org).

```json
{
    "require": {
        "umpirsky/zymfony-validator": "1.0.*"
    }
}
```

## Examples

### Forms

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
                    'validator' => 'creditcard',
                ))
            ));
    }
}
```
[See more examples.](https://github.com/umpirsky/Silex-Kitchen-Edition/blob/zymfony-validator/src/controllers.php#L68)

### Annotations

```php
<?php

use Zymfony\Component\Validator\Constraint;

class ZymfonyModel
{
    /**
     * @Constraint(validator = "creditcard")
     */
    protected $creditCard;
}
```
[See more examples.](https://github.com/umpirsky/symfony-standard/blob/zymfony-validator/src/Acme/DemoBundle/Model/Contact.php)

## Validators Available

%ValidatorsAvailable%
## Tests

To run the test suite, you need [PHPUnit](https://github.com/sebastianbergmann/phpunit).

    $ phpunit

## License

Zymfony Validator is licensed under the MIT license.
