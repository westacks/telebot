<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object represents the content of a media message to be sent. It should be one of
 *
 * - [InputMediaAnimation](https://core.telegram.org/bots/api#inputmediaanimation)
 * - [InputMediaDocument](https://core.telegram.org/bots/api#inputmediadocument)
 * - [InputMediaAudio](https://core.telegram.org/bots/api#inputmediaaudio)
 * - [InputMediaPhoto](https://core.telegram.org/bots/api#inputmediaphoto)
 * - [InputMediaVideo](https://core.telegram.org/bots/api#inputmediavideo)
 */
abstract class InputMedia extends TelegramObject
{
    protected static $types = [
        'photo' => InputMediaPhoto::class,
        'video' => InputMediaVideo::class,
        'animation' => InputMediaAnimation::class,
        'audio' => InputMediaAudio::class,
        'document' => InputMediaDocument::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        if ($class = static::$types[$object['type'] ?? null] ?? null) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
