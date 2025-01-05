<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the type of a background. Currently, it can be one of
 *
 * - [BackgroundTypeFill](https://core.telegram.org/bots/api#backgroundtypefill)
 * - [BackgroundTypeWallpaper](https://core.telegram.org/bots/api#backgroundtypewallpaper)
 * - [BackgroundTypePattern](https://core.telegram.org/bots/api#backgroundtypepattern)
 * - [BackgroundTypeChatTheme](https://core.telegram.org/bots/api#backgroundtypechattheme)
 */
abstract class BackgroundType extends TelegramObject
{
    protected static $types = [
        'fill' => BackgroundTypeFill::class,
        'wallpaper' => BackgroundTypeWallpaper::class,
        'pattern' => BackgroundTypePattern::class,
        'chat_theme' => BackgroundTypeChatTheme::class,
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
