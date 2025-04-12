<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the the voice message.
 * @property-read string $type Type of the result, must be voice
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $voice_url A valid URL for the voice recording
 * @property-read string $title Recording title
 * @property-read ?string $caption Optional. Caption, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?int $voice_duration Optional. Recording duration in seconds
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the voice recording
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvoice
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $voice_url,
        public readonly string $title,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?int $voice_duration,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
    ) {
    }
}
