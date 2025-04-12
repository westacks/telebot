<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the type of a background. Currently, it can be one of
 * - [BackgroundTypeFill](https://core.telegram.org/bots/api#backgroundtypefill)
 * - [BackgroundTypeWallpaper](https://core.telegram.org/bots/api#backgroundtypewallpaper)
 * - [BackgroundTypePattern](https://core.telegram.org/bots/api#backgroundtypepattern)
 * - [BackgroundTypeChatTheme](https://core.telegram.org/bots/api#backgroundtypechattheme)
 *
 * @see https://core.telegram.org/bots/api#backgroundtype
 */
abstract class BackgroundType extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'fill' => BackgroundTypeFill::class,
            'wallpaper' => BackgroundTypeWallpaper::class,
            'pattern' => BackgroundTypePattern::class,
            'chat_theme' => BackgroundTypeChatTheme::class,
            default => throw new \InvalidArgumentException("Unknown BackgroundType: ".$parameters['type']),
        };
    }
}
