<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes an emoji. Currently, it can be one of
 * - [EmojiTypeEmoji](https://core.telegram.org/bots/api#emojitypeemoji)
 * - [EmojiTypeCustomEmoji](https://core.telegram.org/bots/api#emojitypecustomemoji)
 *
 * @see https://core.telegram.org/bots/api#emojitype
 */
abstract class EmojiType extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'emoji' => EmojiTypeEmoji::class,
            'custom_emoji' => EmojiTypeCustomEmoji::class,
            default => throw new \InvalidArgumentException("Unknown EmojiType: ".$parameters['type']),
        };
    }
}
