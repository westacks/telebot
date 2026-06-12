<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the content of a poll option to be sent. It should be one of
 * - [InputMediaAnimation](https://core.telegram.org/bots/api#inputmediaanimation)
 * - [InputMediaLink](https://core.telegram.org/bots/api#inputmedialink)
 * - [InputMediaLivePhoto](https://core.telegram.org/bots/api#inputmedialivephoto)
 * - [InputMediaLocation](https://core.telegram.org/bots/api#inputmedialocation)
 * - [InputMediaPhoto](https://core.telegram.org/bots/api#inputmediaphoto)
 * - [InputMediaSticker](https://core.telegram.org/bots/api#inputmediasticker)
 * - [InputMediaVenue](https://core.telegram.org/bots/api#inputmediavenue)
 * - [InputMediaVideo](https://core.telegram.org/bots/api#inputmediavideo)
 *
 * @see https://core.telegram.org/bots/api#inputpolloptionmedia
 */
abstract class InputPollOptionMedia extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'animation' => InputMediaAnimation::class,
            'link' => InputMediaLink::class,
            'live_photo' => InputMediaLivePhoto::class,
            'location' => InputMediaLocation::class,
            'photo' => InputMediaPhoto::class,
            'sticker' => InputMediaSticker::class,
            'venue' => InputMediaVenue::class,
            'video' => InputMediaVideo::class,
            default => throw new \InvalidArgumentException("Unknown InputPollOptionMedia: ".$parameters['type']),
        };
    }
}
