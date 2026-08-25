<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * @property-read int $receiver_user_id Identifier of the user who will receive the message. It is not guaranteed that the user will receive the message, especially if they are offline. See here for more details.
 * @property-read ?string $callback_query_id Optional. Identifier of the callback query which triggered the message, if any
 * @property-read ?bool $replace_callback_query_message Optional. Pass True if the ephemeral message must be shown in place of the original message. Must be False for callback queries from ephemeral messages, which must be edited using regular editEphemeralMessage… methods.
 *
 * @see https://core.telegram.org/bots/api#ephemeralmessageparameters
 */
class EphemeralMessageParameters extends TelegramObject
{
    public function __construct(
        public readonly int $receiver_user_id,
        public readonly ?string $callback_query_id,
        public readonly ?bool $replace_callback_query_message,
    ) {
    }
}
