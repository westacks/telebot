<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a photo to be sent.
 *
 * @property string          $type                     Type of the result, must be photo
 * @property string          $media                    File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 * @property string          $caption                  Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string          $parse_mode               Optional. Mode for parsing entities in the photo caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[] $caption_entities         Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool            $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property bool            $has_spoiler              Optional. Pass True if the photo needs to be covered with a spoiler animation
 */
class InputMediaPhoto extends InputMedia
{
    protected $attributes = [
        'type' => 'string',
        'media' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'has_spoiler' => 'boolean',
    ];
}
