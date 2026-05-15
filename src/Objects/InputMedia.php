<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the content of a media message to be sent. It should be one of
 * - [InputMediaAnimation](https://core.telegram.org/bots/api#inputmediaanimation)
 * - [InputMediaAudio](https://core.telegram.org/bots/api#inputmediaaudio)
 * - [InputMediaDocument](https://core.telegram.org/bots/api#inputmediadocument)
 * - [InputMediaLivePhoto](https://core.telegram.org/bots/api#inputmedialivephoto)
 * - [InputMediaPhoto](https://core.telegram.org/bots/api#inputmediaphoto)
 * - [InputMediaVideo](https://core.telegram.org/bots/api#inputmediavideo)
 *
 * @see https://core.telegram.org/bots/api#inputmedia
 */
abstract class InputMedia extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'animation' => InputMediaAnimation::class,
            'audio' => InputMediaAudio::class,
            'document' => InputMediaDocument::class,
            'live_photo' => InputMediaLivePhoto::class,
            'photo' => InputMediaPhoto::class,
            'video' => InputMediaVideo::class,
            default => throw new \InvalidArgumentException("Unknown InputMedia: ".$parameters['type']),
        };
    }
}
