<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes paid media. Currently, it can be one of
 * - [PaidMediaLivePhoto](https://core.telegram.org/bots/api#paidmedialivephoto)
 * - [PaidMediaPhoto](https://core.telegram.org/bots/api#paidmediaphoto)
 * - [PaidMediaPreview](https://core.telegram.org/bots/api#paidmediapreview)
 * - [PaidMediaVideo](https://core.telegram.org/bots/api#paidmediavideo)
 *
 * @see https://core.telegram.org/bots/api#paidmedia
 */
abstract class PaidMedia extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'live_photo' => PaidMediaLivePhoto::class,
            'photo' => PaidMediaPhoto::class,
            'preview' => PaidMediaPreview::class,
            'video' => PaidMediaVideo::class,
            default => throw new \InvalidArgumentException("Unknown PaidMedia: ".$parameters['type']),
        };
    }
}
