<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a video to be sent.
 *
 * @property string          $type                     Type of the result, must be video
 * @property string          $media                    File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 * @property InputFile       $thumbnail                Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 * @property string          $caption                  Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property string          $parse_mode               Optional. Mode for parsing entities in the video caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[] $caption_entities         Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool            $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property int             $width                    Optional. Video width
 * @property int             $height                   Optional. Video height
 * @property int             $duration                 Optional. Video duration in seconds
 * @property bool            $supports_streaming       Optional. Pass True if the uploaded video is suitable for streaming
 * @property bool            $has_spoiler              Optional. Pass True if the video needs to be covered with a spoiler animation
 */
class InputMediaVideo extends InputMedia
{
    protected $attributes = [
        'type' => 'string',
        'media' => 'string',
        'thumbnail' => 'InputFile',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'width' => 'integer',
        'height' => 'integer',
        'duration' => 'integer',
        'supports_streaming' => 'boolean',
        'has_spoiler' => 'boolean',
    ];
}
