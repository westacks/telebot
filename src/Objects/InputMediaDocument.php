<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a general file to be sent.
 * @property-read string $type Type of the result, must be document
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?string $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @property-read ?string $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $disable_content_type_detection Optional. Disables automatic server-side content type detection for files uploaded using multipart/form-data. Always True, if the document is sent as part of an album.
 *
 * @see https://core.telegram.org/bots/api#inputmediadocument
 */
class InputMediaDocument extends InputMedia
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $thumbnail,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $disable_content_type_detection,
    ) {
    }
}
