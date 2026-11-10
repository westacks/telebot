<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The theme based on a unique gift owned by the user or the chat.
 * @property-read string $type Type of the theme, always “unique_gift”
 * @property-read UniqueGift $gift The gift
 *
 * @see https://core.telegram.org/bots/api#chatsharethemeuniquegift
 */
class ChatShareThemeUniqueGift extends ChatShareTheme
{
    public function __construct(
        public readonly string $type,
        public readonly UniqueGift $gift,
    ) {
    }
}
