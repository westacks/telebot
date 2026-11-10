<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the theme of the screen for sharing a link to a user or a chat. Currently, it can be one of
 * - [ChatShareThemeEmoji](https://core.telegram.org/bots/api#chatsharethemeemoji)
 * - [ChatShareThemeUniqueGift](https://core.telegram.org/bots/api#chatsharethemeuniquegift)
 *
 * @see https://core.telegram.org/bots/api#chatsharetheme
 */
abstract class ChatShareTheme extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'emoji' => ChatShareThemeEmoji::class,
            'unique_gift' => ChatShareThemeUniqueGift::class,
            default => throw new \InvalidArgumentException("Unknown ChatShareTheme: ".$parameters['type']),
        };
    }
}
