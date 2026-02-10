<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about an ownership change in the chat.
 * @property-read User $new_owner The new owner of the chat
 *
 * @see https://core.telegram.org/bots/api#chatownerchanged
 */
class ChatOwnerChanged extends TelegramObject
{
    public function __construct(
        public readonly User $new_owner,
    ) {
    }
}
