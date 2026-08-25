<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents a sticker file to be sent.
 * @property-read string $type Type of the media, must be sticker
 * @property-read string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a .WEBP sticker from the Internet, or pass “attach://<file_attach_name>” to upload a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * @property-read ?string $emoji Optional. Emoji associated with the sticker; only for just uploaded stickers
 *
 * @see https://core.telegram.org/bots/api#inputmediasticker
 */
class InputMediaSticker extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly string $media,
        public readonly ?string $emoji,
    ) {
    }
}
