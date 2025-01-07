<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the way a background is filled based on the selected colors. Currently, it can be one of
 *
 * - [BackgroundFillSolid](https://core.telegram.org/bots/api#backgroundfillsolid)
 * - [BackgroundFillGradient](https://core.telegram.org/bots/api#backgroundfillgradient)
 * - [BackgroundFillFreeformGradient](https://core.telegram.org/bots/api#backgroundfillfreeformgradient)
 */
abstract class BackgroundFill extends TelegramObject
{
    protected static $types = [
        'solid' => BackgroundFillSolid::class,
        'gradient' => BackgroundFillGradient::class,
        'freeform_gradient' => BackgroundFillFreeformGradient::class,
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
