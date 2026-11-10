<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains a list of backdrops, which can be used as the background of a theme of the screen for sharing a link to a user or a chat.
 * @property-read ChatShareThemeBackdrop[] $backdrops The list of backdrops
 *
 * @see https://core.telegram.org/bots/api#chatsharethemebackdrops
 */
class ChatShareThemeBackdrops extends TelegramObject
{
    public function __construct(
        public readonly array $backdrops,
    ) {
    }
}
