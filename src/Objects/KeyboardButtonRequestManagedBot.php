<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object defines the parameters for the creation of a managed bot. Information about the created bot will be shared with the bot using the update managed_bot and a Message with the field managed_bot_created.
 * @property-read int $request_id Signed 32-bit identifier of the request. Must be unique within the message
 * @property-read ?string $suggested_name Optional. Suggested name for the bot
 * @property-read ?string $suggested_username Optional. Suggested username for the bot
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestmanagedbot
 */
class KeyboardButtonRequestManagedBot extends TelegramObject
{
    public function __construct(
        public readonly int $request_id,
        public readonly ?string $suggested_name,
        public readonly ?string $suggested_username,
    ) {
    }
}
