<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a voice message stored on the Telegram servers. By default, this voice message will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the voice message.
 * @property-read string $type Type of the result, must be voice
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $voice_file_id A valid file identifier for the voice message
 * @property-read string $title Voice message title
 * @property-read ?string $caption Optional. Caption, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the voice message
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
 */
class InlineQueryResultCachedVoice extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $voice_file_id,
        public readonly string $title,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
    ) {
    }
}
