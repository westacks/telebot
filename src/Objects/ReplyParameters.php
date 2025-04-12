<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes reply parameters for the message that is being sent.
 * @property-read int $message_id Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
 * @property-read null|int|string $chat_id Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the channel (in the format @channelusername). Not supported for messages sent on behalf of a business account.
 * @property-read ?bool $allow_sending_without_reply Optional. Pass True if the message should be sent even if the specified message to be replied to is not found. Always False for replies in another chat or forum topic. Always True for messages sent on behalf of a business account.
 * @property-read ?string $quote Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found in the original message.
 * @property-read ?string $quote_parse_mode Optional. Mode for parsing entities in the quote. See formatting options for more details.
 * @property-read ?MessageEntity[] $quote_entities Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
 * @property-read ?int $quote_position Optional. Position of the quote in the original message in UTF-16 code units
 *
 * @see https://core.telegram.org/bots/api#replyparameters
 */
class ReplyParameters extends TelegramObject
{
    public function __construct(
        public readonly int $message_id,
        public readonly null|int|string $chat_id,
        public readonly ?bool $allow_sending_without_reply,
        public readonly ?string $quote,
        public readonly ?string $quote_parse_mode,
        public readonly ?array $quote_entities,
        public readonly ?int $quote_position,
    ) {
    }
}
