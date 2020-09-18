<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property String                    $type                    Type of the result, must be mpeg4_gif
 * @property String                    $id                      Unique identifier for this result, 1-64 bytes
 * @property String                    $mpeg4_url               A valid URL for the MP4 file. File size must not exceed 1MB
 * @property Integer                   $mpeg4_width             _Optional_. Video width
 * @property Integer                   $mpeg4_height            _Optional_. Video height
 * @property Integer                   $mpeg4_duration          _Optional_. Video duration
 * @property String                    $thumb_url               URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property String                    $thumb_mime_type         _Optional_. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
 * @property String                    $title                   _Optional_. Title for the result
 * @property String                    $caption                 _Optional_. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
 * @property String                    $parse_mode              _Optional_. Mode for parsing entities in the caption. See formatting options for more details.
 * @property InlineKeyboardMarkup      $reply_markup            _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent       $input_message_content   _Optional_. Content of the message to be sent instead of the video animation

 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'mpeg4_url'             => 'string',
            'mpeg4_width'           => 'integer',
            'mpeg4_height'          => 'integer',
            'mpeg4_duration'        => 'integer',
            'thumb_url'             => 'string',
            'thumb_mime_type'       => 'string',
            'title'                 => 'string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class
        ];
    }
}
