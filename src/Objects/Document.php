<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 *
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property PhotoSize $thumb          _Optional_. Document thumbnail as defined by sender
 * @property string    $file_name      _Optional_. Original filename as defined by sender
 * @property string    $mime_type      _Optional_. MIME type of the file as defined by sender
 * @property int       $file_size      _Optional_. File size
 */
class Document extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'thumb' => PhotoSize::class,
            'file_name' => 'string',
            'mime_type' => 'string',
            'file_size' => 'integer',
        ];
    }
}
