<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A regular emoji.
 * @property-read string $type Type of the emoji, always “emoji”
 * @property-read string $emoji The emoji
 *
 * @see https://core.telegram.org/bots/api#emojitypeemoji
 */
class EmojiTypeEmoji extends EmojiType
{
    public function __construct(
        public readonly string $type,
        public readonly string $emoji,
    ) {
    }
}
