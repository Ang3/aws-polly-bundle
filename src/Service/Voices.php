<?php

namespace Ang3\Bundle\AwsPollyBundle\Service;

final class Voices
{
    /**
     * Fr_FR voices.
     */
    public const LEA = 'Lea';
    public const CELINE = 'Celine';
    public const MATHIEU = 'Mathieu';

    /**
     * Fr_CA voices.
     */
    public const CHANTAL = 'Chantal';

    /**
     * En_UK voices.
     */
    public const AMY = 'Amy';
    public const EMMA = 'Emma';
    public const BRIAN = 'Brian';

    private static array $voices = [
        self::LEA,
        self::CELINE,
        self::MATHIEU,
        self::CHANTAL,
        self::AMY,
        self::EMMA,
        self::BRIAN,
    ];

    private static array $regions = [
        self::LEA => 'eu-west-2',
        self::CELINE => 'eu-west-3',
        self::MATHIEU => 'eu-west-3',
        self::CHANTAL => 'eu-west-3',
        self::AMY => 'eu-central-1',
        self::EMMA => 'eu-central-1',
        self::BRIAN => 'eu-central-1',
    ];

    private static array $engines = [
        self::LEA => 'neural',
        self::CELINE => 'standard',
        self::MATHIEU => 'standard',
        self::CHANTAL => 'standard',
        self::AMY => 'neural',
        self::EMMA => 'neural',
        self::BRIAN => 'neural',
    ];

    public static function getVoices(): array
    {
        return self::$voices;
    }

    public static function getDefaultRegion(string $voice): ?string
    {
        return self::$regions[$voice];
    }

    public static function getDefaultEngine(string $voice): string
    {
        return self::$engines[$voice] ?: 'standard';
    }
}
