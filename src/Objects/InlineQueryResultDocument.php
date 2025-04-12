<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 * @property-read string $type Type of the result, must be document
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $title Title for the result
 * @property-read ?string $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read string $document_url A valid URL for the file
 * @property-read string $mime_type MIME type of the content of the file, either “application/pdf” or “application/zip”
 * @property-read ?string $description Optional. Short description of the result
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the file
 * @property-read ?string $thumbnail_url Optional. URL of the thumbnail (JPEG only) for the file
 * @property-read ?int $thumbnail_width Optional. Thumbnail width
 * @property-read ?int $thumbnail_height Optional. Thumbnail height
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultdocument
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $title,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly string $document_url,
        public readonly string $mime_type,
        public readonly ?string $description,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
        public readonly ?string $thumbnail_url,
        public readonly ?int $thumbnail_width,
        public readonly ?int $thumbnail_height,
    ) {
    }
}
