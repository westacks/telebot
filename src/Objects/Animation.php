<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 *
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int       $width          Video width as defined by sender
 * @property int       $height         Video height as defined by sender
 * @property int       $duration       Duration of the video in seconds as defined by sender
 * @property PhotoSize $thumb          _Optional_. Animation thumbnail as defined by sender
 * @property string    $file_name      _Optional_. Original animation filename as defined by sender
 * @property string    $mime_type      _Optional_. MIME type of the file as defined by sender
 * @property int       $file_size      _Optional_. File size
 */
class Animation extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'width' => 'integer',
            'height' => 'integer',
            'duration' => 'integer',
            'thumb' => PhotoSize::class,
            'file_name' => 'string',
            'mime_type' => 'string',
            'file_size' => 'integer',
        ];
    }
}
