AWS Polly bundle
================

[![Build Status](https://api.travis-ci.com/Ang3/aws-polly-bundle.svg?branch=main)](https://app.travis-ci.com/github/Ang3/aws-polly-bundle)
[![Latest Stable Version](https://poser.pugx.org/ang3/aws-polly-bundle/v/stable)](https://packagist.org/packages/ang3/aws-polly-bundle)
[![Latest Unstable Version](https://poser.pugx.org/ang3/aws-polly-bundle/v/unstable)](https://packagist.org/packages/ang3/aws-polly-bundle)
[![Total Downloads](https://poser.pugx.org/ang3/aws-polly-bundle/downloads)](https://packagist.org/packages/ang3/aws-polly-bundle)

This bundle integrates AWS Polly to your project.

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

In file `.env`, add the contents below and adapt it to your needs:

```dotenv
###> ang3/aws-polly-bundle ###
AWS_POLLY_KEY="YOUR_KEY"
AWS_POLLY_SECRET="YOUR_SECRET"
AWS_POLLY_REGION="YOUR_REGION"
AWS_POLLY_VERSION="2016-06-10"
###< ang3/aws-polly-bundle ###
```

Make sure to replace `YOUR_KEY`, `YOUR_SECRET`, `YOUR_REGION` by your AWS settings.

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

Polly speech synthesizer
------------------------

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
/** @var \Ang3\Bundle\AwsBundle\Service\SpeechSynthesizer $speechSynthesizer */

$audioFileUrl = $speechSynthesizer->create('Hello world!', 'Amy');
```

The function returns a secured URL to the MP3 file.

That's it!