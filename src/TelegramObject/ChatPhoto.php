<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents a chat photo.
 * 
 * @property String            $small_file_id           File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
 * @property String            $small_file_unique_id    Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property String            $big_file_id             File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
 * @property String            $big_file_unique_id      Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * 
 * @package WeStacks\TeleBot\TelegramObject
 */

class ChatPhoto extends TelegramObject
{
    protected function relations()
    {
        return [
            'small_file_id'         => 'string',
            'small_file_unique_id'  => 'string',
            'big_file_id'           => 'string',
            'big_file_unique_id'    => 'string'
        ];
    }
}