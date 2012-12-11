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

## Validators Available

* [alnum](https://github.com/zendframework/zf2/tree/master/library/Zend/I18n/Validator/Alnum.php)
* [alpha](https://github.com/zendframework/zf2/tree/master/library/Zend/I18n/Validator/Alpha.php)
* [barcodecode25interleaved](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Code25interleaved.php)
* [barcodecode25](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Code25.php)
* [barcodecode39ext](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Code39ext.php)
* [barcodecode39](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Code39.php)
* [barcodecode93ext](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Code93ext.php)
* [barcodecode93](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Code93.php)
* [barcodeean12](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean12.php)
* [barcodeean13](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean13.php)
* [barcodeean14](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean14.php)
* [barcodeean18](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean18.php)
* [barcodeean2](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean2.php)
* [barcodeean5](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean5.php)
* [barcodeean8](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Ean8.php)
* [barcodegtin12](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Gtin12.php)
* [barcodegtin13](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Gtin13.php)
* [barcodegtin14](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Gtin14.php)
* [barcodeidentcode](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Identcode.php)
* [barcodeintelligentmail](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Intelligentmail.php)
* [barcodeissn](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Issn.php)
* [barcodeitf14](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Itf14.php)
* [barcodeleitcode](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Leitcode.php)
* [barcodeplanet](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Planet.php)
* [barcodepostnet](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Postnet.php)
* [barcoderoyalmail](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Royalmail.php)
* [barcodesscc](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Sscc.php)
* [barcodeupca](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Upca.php)
* [barcodeupce](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode/Upce.php)
* [barcode](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Barcode.php)
* [between](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Between.php)
* [callback](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Callback.php)
* [creditcard](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/CreditCard.php)
* [csrf](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Csrf.php)
* [date](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Date.php)
* [datestep](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/DateStep.php)
* [dbnorecordexists](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Db/NoRecordExists.php)
* [dbrecordexists](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Db/RecordExists.php)
* [digits](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Digits.php)
* [emailaddress](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/EmailAddress.php)
* [explode](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Explode.php)
* [filecount](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Count.php)
* [filecrc32](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Crc32.php)
* [fileexcludeextension](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/ExcludeExtension.php)
* [fileexcludemimetype](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/ExcludeMimeType.php)
* [fileexists](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Exists.php)
* [fileextension](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Extension.php)
* [filefilessize](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/FilesSize.php)
* [filehash](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Hash.php)
* [fileimagesize](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/ImageSize.php)
* [fileiscompressed](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/IsCompressed.php)
* [fileisimage](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/IsImage.php)
* [filemd5](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Md5.php)
* [filemimetype](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/MimeType.php)
* [filenotexists](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/NotExists.php)
* [filesha1](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Sha1.php)
* [filesize](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Size.php)
* [fileupload](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/Upload.php)
* [filewordcount](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/File/WordCount.php)
* [float](https://github.com/zendframework/zf2/tree/master/library/Zend/I18n/Validator/Float.php)
* [greaterthan](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/GreaterThan.php)
* [hex](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Hex.php)
* [hostname](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Hostname.php)
* [iban](https://github.com/zendframework/zf2/tree/master/library/Zend/I18n/Validator/Iban.php)
* [identical](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Identical.php)
* [inarray](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/InArray.php)
* [int](https://github.com/zendframework/zf2/tree/master/library/Zend/I18n/Validator/Int.php)
* [ip](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Ip.php)
* [isbn](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Isbn.php)
* [lessthan](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/LessThan.php)
* [notempty](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/NotEmpty.php)
* [postcode](https://github.com/zendframework/zf2/tree/master/library/Zend/I18n/Validator/PostCode.php)
* [regex](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Regex.php)
* [sitemapchangefreq](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Sitemap/Changefreq.php)
* [sitemaplastmod](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Sitemap/Lastmod.php)
* [sitemaploc](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Sitemap/Loc.php)
* [sitemappriority](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Sitemap/Priority.php)
* [stringlength](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/StringLength.php)
* [step](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Step.php)
* [uri](https://github.com/zendframework/zf2/tree/master/library/Zend/Validator/Uri.php)

## Tests

To run the test suite, you need [PHPUnit](https://github.com/sebastianbergmann/phpunit).

    $ phpunit

## License

Zymfony Validator is licensed under the MIT license.
