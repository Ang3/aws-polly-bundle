AWS Polly bundle
================

[![Code Quality](https://github.com/Ang3/aws-polly-bundle/actions/workflows/php_lint.yml/badge.svg)](https://github.com/Ang3/aws-polly-bundle/actions/workflows/php_lint.yml)
[![PHPUnit Tests](https://github.com/Ang3/aws-polly-bundle/actions/workflows/phpunit.yml/badge.svg)](https://github.com/Ang3/aws-polly-bundle/actions/workflows/phpunit.yml)
[![Symfony Bundle](https://github.com/Ang3/aws-polly-bundle/actions/workflows/symfony_bundle.yml/badge.svg)](https://github.com/Ang3/aws-polly-bundle/actions/workflows/symfony_bundle.yml)
[![Latest Stable Version](https://poser.pugx.org/ang3/aws-polly-bundle/v/stable)](https://packagist.org/packages/ang3/aws-polly-bundle)
[![Latest Unstable Version](https://poser.pugx.org/ang3/aws-polly-bundle/v/unstable)](https://packagist.org/packages/ang3/aws-polly-bundle)
[![Total Downloads](https://poser.pugx.org/ang3/aws-polly-bundle/downloads)](https://packagist.org/packages/ang3/aws-polly-bundle)

This bundle integrates AWS Polly to your project. It installs the AWS SDK for PHP for the client 
and the AsyncAws Bundle for credentials.

**Features**

- Client
- Speech synthesizer

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your app directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require ang3/aws-polly-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Configure the bundle
----------------------------

**Make sure you have configured the bundle AsyncAws, especially for authentication.**

Create the file `config/packages/ang3_aws_polly.yaml`, and add the contents below:

```yaml
# config/packages/ang3_aws_polly.yaml
ang3_aws_polly:
  region: 'YOUR_REGION'
```

Make sure to replace `YOUR_REGION` by your AWS settings.

**Be aware some voices are available only on specific regions or engine. Please refer to the AWS documentation.**

Usage
=====

Client
------

**Public service ID:** `ang3.aws_polly.client`

To use the ```Polly``` client, get it by dependency injection:

```php
namespace App\Service;

use Aws\Polly\PollyClient;

class MyService
{
    public function __construct(private PollyClient $client)
    {
    }
}
```

Speech synthesizer
------------------

**Public service ID:** `ang3.aws_polly.speech_synthesizer`

To synthesize a speech, use dependency injection:

```php
namespace App\Service;

use Ang3\Bundle\AwsBundle\Service\SpeechSynthesizer;

class MyService
{
    public function __construct(private SpeechSynthesizer $speechSynthesizer)
    {
    }
}
```

Then, synthesize a speech with your text (mp3):

```php
use Ang3\Bundle\AwsPollyBundle\Enum\Voice;

/** @var \Ang3\Bundle\AwsBundle\Service\SpeechSynthesizer $speechSynthesizer */

$audioFileUrl = $speechSynthesizer->create('Hello world!', Voice::AMY);
```

The function returns a secured URL to the MP3 file.

That's it!