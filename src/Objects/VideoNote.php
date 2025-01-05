<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a [video message](https://telegram.org/blog/video-messages-and-telescope) (available in Telegram apps as of [v.4.0](https://telegram.org/blog/video-messages-and-telescope)).
 *
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int       $length         Video width and height (diameter of the video message) as defined by the sender
 * @property int       $duration       Duration of the video in seconds as defined by the sender
 * @property PhotoSize $thumbnail      Optional. Video thumbnail
 * @property int       $file_size      Optional. File size in bytes
 */
class VideoNote extends TelegramObject
{
    protected $attributes = [
        'file_id' => 'string',
        'file_unique_id' => 'string',
        'length' => 'integer',
        'duration' => 'integer',
        'thumbnail' => 'PhotoSize',
        'file_size' => 'integer',
    ];
}
