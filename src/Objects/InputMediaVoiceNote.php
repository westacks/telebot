<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a voice message file to be sent.
 * @property-read string $type Type of the media, must be voice_note
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?string $caption Optional. Caption of the voice message to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?int $duration Optional. Duration of the voice message in seconds
 *
 * @see https://core.telegram.org/bots/api#inputmediavoicenote
 */
class InputMediaVoiceNote extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?int $duration,
    ) {
    }
}
