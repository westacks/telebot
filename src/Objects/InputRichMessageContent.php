<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of a rich message to be sent as the result of an inline query.
 * @property-read InputRichMessage $rich_message The message to be sent
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagecontent
 */
class InputRichMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly InputRichMessage $rich_message,
    ) {
    }
}
