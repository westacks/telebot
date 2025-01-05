<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 *
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int       $width          Video width as defined by the sender
 * @property int       $height         Video height as defined by the sender
 * @property int       $duration       Duration of the video in seconds as defined by the sender
 * @property PhotoSize $thumbnail      Optional. Animation thumbnail as defined by the sender
 * @property string    $file_name      Optional. Original animation filename as defined by the sender
 * @property string    $mime_type      Optional. MIME type of the file as defined by the sender
 * @property int       $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 */
class Animation extends TelegramObject
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
