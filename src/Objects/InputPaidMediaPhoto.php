<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The paid media to send is a photo.
 *
 * @property string $type  Type of the media, must be photo
 * @property string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 */
class InputPaidMediaPhoto extends InputMedia
{
    protected $attributes = [
        'type' => 'string',
        'media' => 'string',
    ];
}
