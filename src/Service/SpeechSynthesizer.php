<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/aws-polly-bundle
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Bundle\AwsPollyBundle\Service;

use Ang3\Bundle\AwsPollyBundle\Enum\Engine;
use Ang3\Bundle\AwsPollyBundle\Enum\Voice;
use Aws\Polly\PollyClient;

class SpeechSynthesizer
{
    public function __construct(
        private readonly PollyClient $pollyClient,
        private readonly string $region
    ) {
    }

    /**
     * Synthesizes a speech and returns the URL of the MP3 file.
     *
     * @throws \InvalidArgumentException
     */
    public function create(string $text, Voice $voice, Engine $engine = null): string
    {
        return $this->pollyClient->createSynthesizeSpeechPreSignedUrl([
            'Text' => $text,
            'OutputFormat' => 'mp3',
            'VoiceId' => $voice->value,
            'region' => $this->region,
            'engine' => ($engine ?: Engine::STANDARD)->value,
        ]);
    }
}
