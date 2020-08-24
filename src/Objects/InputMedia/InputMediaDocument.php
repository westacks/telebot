<?php

namespace WeStacks\TeleBot\Objects\InputMedia;

use WeStacks\TeleBot\Objects\InputMedia;

/**
 * Represents a general file to be sent.
 * 
 * @property String                $type                Type of the result, must be document
 * @property String                $media               File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name\>” to upload a new one using multipart/form-data under <file_attach_name\> name
 * @property InputFile             $thumb               _Optional_. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name\>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name\>
 * @property String                $caption             _Optional_. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property String                $parse_mode          _Optional_. Mode for parsing entities in the document caption
 * 
 * @package WeStacks\TeleBot\Objects\InputMedia
 */
class InputMediaDocument extends InputMedia
{
    protected function relations()
    {
        return [
            'type'          => 'string',
            'media'         => 'string',
            'thumb'         => InputFile::class,
            'caption'       => 'string',
            'parse_mode'    => 'string'
        ];
    }
}