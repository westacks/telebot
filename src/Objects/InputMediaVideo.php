<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a video to be sent.
 * 
 * @property String                $type                    Type of the result, must be video
 * @property String                $media                   File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name\>” to upload a new one using multipart/form-data under <file_attach_name\> name
 * @property InputFile|String      $thumb                   _Optional_. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name\>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name\>
 * @property String                $caption                 _Optional_. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property String                $parse_mode              _Optional_. Mode for parsing entities in the video caption
 * @property Integer               $width                   _Optional_. Video width
 * @property Integer               $height                  _Optional_. Video height
 * @property Integer               $duration                _Optional_. Video duration
 * @property Boolean               $supports_streaming      _Optional_. Pass True, if the uploaded video is suitable for streaming
 * 
 * @package WeStacks\TeleBot\Objects
 */
class InputMediaVideo extends InputMedia
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'media'                 => 'string',
            'thumb'                 => InputFile::class.'|string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'width'                 => 'integer',
            'height'                => 'integer',
            'duration'              => 'integer',
            'supports_streaming'    => 'boolean'
        ];
    }
}