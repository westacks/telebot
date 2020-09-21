<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represent a user's profile pictures.
 *
 * @property int                     $total_count Total number of profile pictures the target user has
 * @property Array<Array<PhotoSize>> $photos      Requested profile pictures (in up to 4 sizes each)
 */
class UserProfilePhotos extends TelegramObject
{
    protected function relations()
    {
        return [
            'total_count' => 'integer',
            'photos' => [[PhotoSize::class]],
        ];
    }
}
