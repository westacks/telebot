<?php

namespace WeStacks\TeleBot\Objects\InputMedia;

use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a photo to be sent.
 *
 * @property string                 $type               Type of the result, must be photo
 * @property string                 $media              File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name\>” to upload a new one using multipart/form-data under <file_attach_name\> name
 * @property string                 $caption            _Optional_. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string                 $parse_mode         _Optional_. Mode for parsing entities in the photo caption
 * @property Array<MessageEntity>   $caption_entities   _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 */
class InputMediaPhoto extends InputMedia
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'media' => InputFile::class,
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class]
        ];
    }
}
