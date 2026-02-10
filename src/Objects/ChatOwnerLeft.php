<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about the chat owner leaving the chat.
 * @property-read ?User $new_owner Optional. The user which will be the new owner of the chat if the previous owner does not return to the chat
 *
 * @see https://core.telegram.org/bots/api#chatownerleft
 */
class ChatOwnerLeft extends TelegramObject
{
    public function __construct(
        public readonly ?User $new_owner,
    ) {
    }
}
