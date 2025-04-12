<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 * @property-read string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property-read string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property-read int $width Photo width
 * @property-read int $height Photo height
 * @property-read ?int $file_size Optional. File size in bytes
 *
 * @see https://core.telegram.org/bots/api#photosize
 */
class PhotoSize extends TelegramObject
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $width,
        public readonly int $height,
        public readonly ?int $file_size,
    ) {
    }
}
