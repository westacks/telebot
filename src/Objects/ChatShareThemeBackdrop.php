<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a backdrop, which can be used as the background of a theme of the screen for sharing a link to a user or a chat.
 * @property-read int $id Unique identifier of the backdrop
 * @property-read string $name Name of the backdrop
 * @property-read UniqueGiftBackdropColors $colors Colors of the backdrop
 *
 * @see https://core.telegram.org/bots/api#chatsharethemebackdrop
 */
class ChatShareThemeBackdrop extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly UniqueGiftBackdropColors $colors,
    ) {
    }
}
