<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a video file.
 * @property-read string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property-read string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property-read int $width Video width as defined by the sender
 * @property-read int $height Video height as defined by the sender
 * @property-read int $duration Duration of the video in seconds as defined by the sender
 * @property-read ?PhotoSize $thumbnail Optional. Video thumbnail
 * @property-read ?PhotoSize[] $cover Optional. Available sizes of the cover of the video in the message
 * @property-read ?int $start_timestamp Optional. Timestamp in seconds from which the video will play in the message
 * @property-read ?string $file_name Optional. Original filename as defined by the sender
 * @property-read ?string $mime_type Optional. MIME type of the file as defined by the sender
 * @property-read ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 *
 * @see https://core.telegram.org/bots/api#video
 */
class Video extends TelegramObject
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $width,
        public readonly int $height,
        public readonly int $duration,
        public readonly ?PhotoSize $thumbnail,
        public readonly ?array $cover,
        public readonly ?int $start_timestamp,
        public readonly ?string $file_name,
        public readonly ?string $mime_type,
        public readonly ?int $file_size,
    ) {
    }
}
