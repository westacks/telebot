<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes an inline message sent by a guest bot.
 * @property-read string $inline_message_id Identifier of the sent inline message
 *
 * @see https://core.telegram.org/bots/api#sentguestmessage
 */
class SentGuestMessage extends TelegramObject
{
    public function __construct(
        public readonly string $inline_message_id,
    ) {
    }
}
