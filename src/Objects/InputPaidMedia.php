<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the paid media to be sent. Currently, it can be one of
 * - [InputPaidMediaPhoto](https://core.telegram.org/bots/api#inputpaidmediaphoto)
 * - [InputPaidMediaVideo](https://core.telegram.org/bots/api#inputpaidmediavideo)
 *
 * @see https://core.telegram.org/bots/api#inputpaidmedia
 */
abstract class InputPaidMedia extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'photo' => InputPaidMediaPhoto::class,
            'video' => InputPaidMediaVideo::class,
            default => throw new \InvalidArgumentException("Unknown InputPaidMedia: ".$parameters['type']),
        };
    }
}
