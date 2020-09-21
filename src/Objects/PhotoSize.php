<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @property string $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int    $width          Photo width
 * @property int    $height         Photo height
 * @property int    $file_size      _Optional_. File size
 */
class PhotoSize extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'width' => 'integer',
            'height' => 'integer',
            'file_size' => 'integer',
        ];
    }
}
