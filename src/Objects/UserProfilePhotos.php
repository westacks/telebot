<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represent a user's profile pictures.
 *
 * @property int           $total_count Total number of profile pictures the target user has
 * @property PhotoSize[][] $photos      Requested profile pictures (in up to 4 sizes each)
 */
class UserProfilePhotos extends TelegramObject
{
    protected $attributes = [
        'total_count' => 'integer',
        'photos' => 'PhotoSize[][]',
    ];
}
