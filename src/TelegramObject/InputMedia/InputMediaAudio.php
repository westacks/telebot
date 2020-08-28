<?php

namespace WeStacks\TeleBot\TelegramObject\InputMedia;

use WeStacks\TeleBot\TelegramObject\InputFile;
use WeStacks\TeleBot\TelegramObject\InputMedia;

/**
 * Represents an audio file to be treated as music to be sent.
 * 
 * @property String                $type                Type of the result, must be audio
 * @property String                $media               File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name\>” to upload a new one using multipart/form-data under <file_attach_name\> name
 * @property InputFile             $thumb               _Optional_. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name\>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name\>
 * @property String                $caption             _Optional_. Caption of the audio to be sent, 0-1024 characters after entities parsing
 * @property String                $parse_mode          _Optional_. Mode for parsing entities in the audio caption
 * @property Integer               $duration            _Optional_. Duration of the audio in seconds
 * @property String                $performer           _Optional_. Performer of the audio
 * @property String                $title               _Optional_. Title of the audio
 * 
 * @package WeStacks\TeleBot\TelegramObject\InputMedia
 */
class InputMediaAudio extends InputMedia
{
    protected function relations()
    {
        return [
            'type'              => 'string',
            'media'             => 'string',
            'thumb'             => InputFile::class,
            'caption'           => 'string',
            'parse_mode'        => 'string',
            'duration'          => 'integer',
            'performer'         => 'string',
            'title'             => 'string'
        ];
    }
}