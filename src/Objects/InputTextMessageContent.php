<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 * @property-read string $message_text Text of the message to be sent, 1-4096 characters
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the message text. See formatting options for more details.
 * @property-read ?MessageEntity[] $entities Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
 * @property-read ?LinkPreviewOptions $link_preview_options Optional. Link preview generation options for the message
 *
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 */
class InputTextMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly string $message_text,
        public readonly ?string $parse_mode,
        public readonly ?array $entities,
        public readonly ?LinkPreviewOptions $link_preview_options,
    ) {
    }
}
