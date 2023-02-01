<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/aws-polly-bundle
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Bundle\AwsPollyBundle\Enum;

enum Voice: string
{
    /*
     * Fr_FR voices.
     */
    case LEA = 'Lea';
    case CELINE = 'Celine';
    case MATHIEU = 'Mathieu';

    /*
     * Fr_CA voices.
     */
    case CHANTAL = 'Chantal';

    /*
     * En_UK voices.
     */
    case AMY = 'Amy';
    case EMMA = 'Emma';
    case BRIAN = 'Brian';

    public static function getValues(): array
    {
        return array_reduce(self::cases(), fn (array $values, Voice $value) => $values + [$value->value], []);
    }

    public function supportsNeuralEngine(): bool
    {
        return \in_array($this, [
            Voice::LEA,
            Voice::AMY,
            Voice::EMMA,
            Voice::BRIAN,
        ], true);
    }
}
