<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represent a user's profile pictures.
 * 
 * @property Integer                       $total_count       Total number of profile pictures the target user has
 * @property Array<Array<PhotoSize>>       $photos            Requested profile pictures (in up to 4 sizes each)
 * 
 * @package WeStacks\TeleBot\Objects
 */
class UserProfilePhotos extends TelegramObject
{
    protected function relations()
    {
        return [
            'total_count' => 'integer',
            'photos'      => array(array(PhotoSize::class))
        ];
    }
}