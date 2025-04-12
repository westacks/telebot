<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a photo to be sent.
 * @property-read string $type Type of the result, must be photo
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?string $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property-read ?bool $has_spoiler Optional. Pass True if the photo needs to be covered with a spoiler animation
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends InputMedia
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?bool $has_spoiler,
    ) {
    }
}
