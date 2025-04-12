<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 * @property-read string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property-read string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property-read int $length Video width and height (diameter of the video message) as defined by the sender
 * @property-read int $duration Duration of the video in seconds as defined by the sender
 * @property-read ?PhotoSize $thumbnail Optional. Video thumbnail
 * @property-read ?int $file_size Optional. File size in bytes
 *
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends TelegramObject
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $length,
        public readonly int $duration,
        public readonly ?PhotoSize $thumbnail,
        public readonly ?int $file_size,
    ) {
    }
}
