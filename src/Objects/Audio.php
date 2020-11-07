<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int       $duration       Duration of the audio in seconds as defined by sender
 * @property string    $performer      _Optional_. Performer of the audio as defined by sender or by audio tags
 * @property string    $title          _Optional_. Title of the audio as defined by sender or by audio tags
 * @property string    $file_name      _Optional_. Original filename as defined by sender
 * @property string    $mime_type      _Optional_. MIME type of the file as defined by sender
 * @property int       $file_size      _Optional_. File size
 * @property PhotoSize $thumb          _Optional_. Thumbnail of the album cover to which the music file belongs
 */
class Audio extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'duration' => 'integer',
            'performer' => 'string',
            'title' => 'string',
            'file_name' => 'string',
            'mime_type' => 'string',
            'file_size' => 'integer',
            'thumb' => PhotoSize::class,
        ];
    }
}
