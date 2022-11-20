<?php

namespace Ang3\Bundle\AwsPollyBundle\Service;

use Aws\Polly\PollyClient;
use InvalidArgumentException;

class SpeechSynthesizer
{
    public function __construct(private PollyClient $pollyClient)
    {
    }

    /**
     * Synthesizes a speech and returns the URL of the MP3 file.
     *
     * @throws InvalidArgumentException
     */
    public function create(string $text, string $voice, string $engine = null, string $region = null): string
    {
        $region = $region ?: Voices::getDefaultRegion($voice);

        if (!$region) {
            throw new InvalidArgumentException(sprintf('No region found for the voice "%s"', $voice));
        }

        $engine = $engine ?: Voices::getDefaultEngine($voice);

        if (!$engine) {
            throw new InvalidArgumentException(sprintf('No engine found for the voice "%s"', $voice));
        }

        return $this->pollyClient->createSynthesizeSpeechPreSignedUrl([
            'Text' => $text,
            'OutputFormat' => 'mp3',
            'VoiceId' => $voice,
            'region' => $region,
            'engine' => $engine,
        ]);
    }
}
