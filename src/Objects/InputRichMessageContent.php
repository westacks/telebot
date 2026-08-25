<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents the content of a rich message to be sent as the result of an inline query.
 * @property-read InputRichMessage $rich_message The message to be sent. Only previously uploaded files may be used in the message.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagecontent
 */
class InputRichMessageContent extends TelegramObject
{
    public function __construct(
        public readonly InputRichMessage $rich_message,
    ) {
    }
}
