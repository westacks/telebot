<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 * @property-read ?string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
 *
 * @see https://core.telegram.org/bots/api#sentwebappmessage
 */
class SentWebAppMessage extends TelegramObject
{
    public function __construct(
        public readonly ?string $inline_message_id,
    ) {
    }
}
