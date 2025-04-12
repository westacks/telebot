<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the way a background is filled based on the selected colors. Currently, it can be one of
 * - [BackgroundFillSolid](https://core.telegram.org/bots/api#backgroundfillsolid)
 * - [BackgroundFillGradient](https://core.telegram.org/bots/api#backgroundfillgradient)
 * - [BackgroundFillFreeformGradient](https://core.telegram.org/bots/api#backgroundfillfreeformgradient)
 *
 * @see https://core.telegram.org/bots/api#backgroundfill
 */
abstract class BackgroundFill extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'solid' => BackgroundFillSolid::class,
            'gradient' => BackgroundFillGradient::class,
            'freeform_gradient' => BackgroundFillFreeformGradient::class,
            default => throw new \InvalidArgumentException("Unknown BackgroundFill: ".$parameters['type']),
        };
    }
}
