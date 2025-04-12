<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represent a user's profile pictures.
 * @property-read int $total_count Total number of profile pictures the target user has
 * @property-read PhotoSize[][] $photos Requested profile pictures (in up to 4 sizes each)
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends TelegramObject
{
    public function __construct(
        public readonly int $total_count,
        public readonly array $photos,
    ) {
    }
}
