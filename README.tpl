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

### Basic Usage

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

### Custom Options and Messages

```php
<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Zend\Validator\StringLength;
use Zymfony\Component\Validator\Constraint;

class ZymfonyType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('my_cool_string', 'text', array(
                'constraints' => new Constraint(array(
                    'validator' => 'stringlength',
                    'options'   => array(
                        'min'      => 2,
                        'max'      => 8,
                        'messages' => array(
                            StringLength::TOO_LONG => 'My cool string is more than %max% characters long.'
                        )
                    )
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

### Yaml

```yaml
ZymfonyModel:
    properties:
        creditcard:
            - Zymfony\Component\Validator\Constraint:
                validator: creditcard
```

## Validators Available

%ValidatorsAvailable%
## Tests

To run the test suite, you need [PHPUnit](https://github.com/sebastianbergmann/phpunit).

    $ phpunit

## License

Zymfony Validator is licensed under the MIT license.
