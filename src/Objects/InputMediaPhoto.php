<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a photo to be sent.
 * 
 * @property String                $type                Type of the result, must be photo
 * @property String                $media               File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name\>” to upload a new one using multipart/form-data under <file_attach_name\> name
 * @property String                $caption             _Optional_. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property String                $parse_mode          _Optional_. Mode for parsing entities in the photo caption
 * 
 * @package WeStacks\TeleBot\Objects
 */
class InputMediaPhoto extends InputMedia
{
    protected function relations()
    {
        return [
            'type'       => 'string',
            'media'      => 'string',
            'caption'    => 'string',
            'parse_mode' => 'string'
        ];
    }
}