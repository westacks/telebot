<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the content of a story to post. Currently, it can be one of
 * - [InputStoryContentPhoto](https://core.telegram.org/bots/api#inputstorycontentphoto)
 * - [InputStoryContentVideo](https://core.telegram.org/bots/api#inputstorycontentvideo)
 *
 * @see https://core.telegram.org/bots/api#inputstorycontent
 */
abstract class InputStoryContent extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'photo' => InputStoryContentPhoto::class,
            'video' => InputStoryContentVideo::class,
            default => throw new \InvalidArgumentException("Unknown InputStoryContent: ".$parameters['type']),
        };
    }
}
