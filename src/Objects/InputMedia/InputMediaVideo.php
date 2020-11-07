<?php

namespace WeStacks\TeleBot\Objects\InputMedia;

use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a video to be sent.
 *
 * @property string                 $type               Type of the result, must be video
 * @property string                 $media              File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name\>” to upload a new one using multipart/form-data under <file_attach_name\> name
 * @property InputFile              $thumb              _Optional_. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name\>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name\>
 * @property string                 $caption            _Optional_. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property string                 $parse_mode         _Optional_. Mode for parsing entities in the video caption
 * @property Array<MessageEntity>   $caption_entities   _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int                    $width              _Optional_. Video width
 * @property int                    $height             _Optional_. Video height
 * @property int                    $duration           _Optional_. Video duration
 * @property bool                   $supports_streaming _Optional_. Pass True, if the uploaded video is suitable for streaming
 */
class InputMediaVideo extends InputMedia
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'media' => InputFile::class,
            'thumb' => InputFile::class,
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'width' => 'integer',
            'height' => 'integer',
            'duration' => 'integer',
            'supports_streaming' => 'boolean',
        ];
    }
}
