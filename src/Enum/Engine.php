<?php

declare(strict_types=1);

/*
 * This file is part of neosolva/app-agrege.
 * This source file is owned by NEOSOLVA INFORMATIQUE.
 */

namespace Ang3\Bundle\AwsPollyBundle\Enum;

enum Engine: string
{
    case STANDARD = 'standard';
    case NEURAL = 'neural';
}
