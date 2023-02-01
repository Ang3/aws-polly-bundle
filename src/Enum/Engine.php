<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/aws-polly-bundle
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Bundle\AwsPollyBundle\Enum;

enum Engine: string
{
    case STANDARD = 'standard';
    case NEURAL = 'neural';
}
