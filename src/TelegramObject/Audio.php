<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 * 
 * @property String          $file_id             Identifier for this file, which can be used to download or reuse the file
 * @property String          $file_unique_id      Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property Integer         $duration            Duration of the audio in seconds as defined by sender
 * @property String          $performer           _Optional_. Performer of the audio as defined by sender or by audio tags
 * @property String          $title               _Optional_. Title of the audio as defined by sender or by audio tags
 * @property String          $mime_type           _Optional_. MIME type of the file as defined by sender
 * @property Integer         $file_size           _Optional_. File size
 * @property PhotoSize       $thumb               _Optional_. Thumbnail of the album cover to which the music file belongs
 * 
 * @package WeStacks\TeleBot\TelegramObject
 */

class Audio extends TelegramObject
{
    protected function relations()
    {
        return [
            'file_id'           => 'string',
            'file_unique_id'    => 'string',
            'duration'          => 'integer',
            'performer'         => 'string',
            'title'             => 'string',
            'mime_type'         => 'string',
            'file_size'         => 'integer',
            'thumb'             => PhotoSize::class
        ];
    }
}