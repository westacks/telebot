<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a live photo.
 * @property-read ?PhotoSize[] $photo Optional. Available sizes of the corresponding static photo
 * @property-read string $file_id Identifier for the video file which can be used to download or reuse the file
 * @property-read string $file_unique_id Unique identifier for the video file which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property-read int $width Video width as defined by the sender
 * @property-read int $height Video height as defined by the sender
 * @property-read int $duration Duration of the video in seconds as defined by the sender
 * @property-read ?string $mime_type Optional. MIME type of the file as defined by the sender
 * @property-read ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 *
 * @see https://core.telegram.org/bots/api#livephoto
 */
class LivePhoto extends TelegramObject
{
    public function __construct(
        public readonly ?array $photo,
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $width,
        public readonly int $height,
        public readonly int $duration,
        public readonly ?string $mime_type,
        public readonly ?int $file_size,
    ) {
    }
}
