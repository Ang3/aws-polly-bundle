<?php

declare(strict_types=1);

/*
 * This file is part of neosolva/app-agrege.
 * This source file is owned by NEOSOLVA INFORMATIQUE.
 */

namespace Ang3\Bundle\AwsPollyBundle\Service;

use Aws\Polly\PollyClient;

class SpeechSynthesizer
{
    public function __construct(
        private readonly PollyClient $pollyClient,
        private readonly string $defaultRegion,
        private readonly string $defaultEngine
    ) {
    }

    /**
     * Synthesizes a speech and returns the URL of the MP3 file.
     *
     * @throws \InvalidArgumentException
     */
    public function create(string $text, string $voice, string $engine = null, string $region = null): string
    {
        $region = $region ?: (Voices::getDefaultRegion($voice) ?: $this->defaultRegion);
        $engine = $engine ?: (Voices::getDefaultEngine($voice) ?: $this->defaultEngine);

        return $this->pollyClient->createSynthesizeSpeechPreSignedUrl([
            'Text' => $text,
            'OutputFormat' => 'mp3',
            'VoiceId' => $voice,
            'region' => $region,
            'engine' => $engine,
        ]);
    }
}
