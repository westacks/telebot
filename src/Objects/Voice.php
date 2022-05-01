<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a voice note.
 *
 * @property string $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int    $duration       Duration of the audio in seconds as defined by sender
 * @property string $mime_type      Optional. MIME type of the file as defined by sender
 * @property int    $file_size      Optional. File size in bytes
 */
class Voice extends TelegramObject
{
    protected $attributes = [
        'file_id' => 'string',
        'file_unique_id' => 'string',
        'duration' => 'integer',
        'mime_type' => 'string',
        'file_size' => 'integer',
    ];
}
