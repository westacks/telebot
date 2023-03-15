<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a video file.
 *
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int       $width          Video width as defined by sender
 * @property int       $height         Video height as defined by sender
 * @property int       $duration       Duration of the video in seconds as defined by sender
 * @property PhotoSize $thumbnail      Optional. Video thumbnail
 * @property string    $file_name      Optional. Original filename as defined by sender
 * @property string    $mime_type      Optional. Mime type of a file as defined by sender
 * @property int       $file_size      Optional. File size in bytes
 */
class Video extends TelegramObject
{
    protected $attributes = [
        'file_id' => 'string',
        'file_unique_id' => 'string',
        'width' => 'integer',
        'height' => 'integer',
        'duration' => 'integer',
        'thumbnail' => 'PhotoSize',
        'file_name' => 'string',
        'mime_type' => 'string',
        'file_size' => 'integer',
    ];
}
