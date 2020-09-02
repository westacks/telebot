<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 * 
 * @property String             $file_id                Identifier for this file, which can be used to download or reuse the file
 * @property String             $file_unique_id         Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property Integer            $length                 Video width and height (diameter of the video message) as defined by sender
 * @property Integer            $duration               Duration of the video in seconds as defined by sender
 * @property PhotoSize          $thumb                  _Optional_. Video thumbnail
 * @property Integer            $file_size              _Optional_. File size
 * 
 * @package WeStacks\TeleBot\Objects
 */

class VideoNote extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id'           => 'string',
            'file_unique_id'    => 'string',
            'length'            => 'integer',
            'duration'          => 'integer',
            'thumb'             => PhotoSize::class,
            'file_size'         => 'integer'
        ];
    }
}