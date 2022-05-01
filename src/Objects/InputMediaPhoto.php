<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a photo to be sent.
 *
 * @property string          $type             Type of the result, must be photo
 * @property InputFile       $media            File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://” to upload a new one using multipart/form-data under  name. More info on Sending Files »
 * @property string          $caption          Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string          $parse_mode       Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 */
class InputMediaPhoto extends InputMedia
{
    protected $attributes = [
        'type' => 'string',
        'media' => 'InputFile',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
    ];
}
