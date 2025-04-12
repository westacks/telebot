<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a chat photo.
 * @property-read string $small_file_id File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
 * @property-read string $small_file_unique_id Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property-read string $big_file_id File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
 * @property-read string $big_file_unique_id Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 *
 * @see https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto extends TelegramObject
{
    public function __construct(
        public readonly string $small_file_id,
        public readonly string $small_file_unique_id,
        public readonly string $big_file_id,
        public readonly string $big_file_unique_id,
    ) {
    }
}
