<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a profile photo to set. Currently, it can be one of
 * - [InputProfilePhotoStatic](https://core.telegram.org/bots/api#inputprofilephotostatic)
 * - [InputProfilePhotoAnimated](https://core.telegram.org/bots/api#inputprofilephotoanimated)
 *
 * @see https://core.telegram.org/bots/api#inputprofilephoto
 */
abstract class InputProfilePhoto extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'static' => InputProfilePhotoStatic::class,
            'animated' => InputProfilePhotoAnimated::class,
            default => throw new \InvalidArgumentException("Unknown InputProfilePhoto: ".$parameters['type']),
        };
    }
}
