<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes paid media. Currently, it can be one of
 * - [PaidMediaPreview](https://core.telegram.org/bots/api#paidmediapreview)
 * - [PaidMediaPhoto](https://core.telegram.org/bots/api#paidmediaphoto)
 * - [PaidMediaVideo](https://core.telegram.org/bots/api#paidmediavideo)
 *
 * @see https://core.telegram.org/bots/api#paidmedia
 */
abstract class PaidMedia extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'preview' => PaidMediaPreview::class,
            'photo' => PaidMediaPhoto::class,
            'video' => PaidMediaVideo::class,
            default => throw new \InvalidArgumentException("Unknown PaidMedia: ".$parameters['type']),
        };
    }
}
