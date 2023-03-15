<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string               $type                  Type of the result, must be mpeg4_gif
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $mpeg4_url             A valid URL for the MP4 file. File size must not exceed 1MB
 * @property int                  $mpeg4_width           Optional. Video width
 * @property int                  $mpeg4_height          Optional. Video height
 * @property int                  $mpeg4_duration        Optional. Video duration
 * @property string               $thumbnail_url         URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property string               $thumbnail_mime_type   Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
 * @property string               $title                 Optional. Title for the result
 * @property string               $caption               Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
 * @property MessageEntity[]      $caption_entities      Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property string               $parse_mode            Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property InlineKeyboardMarkup $reply_markup          Optional. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content Optional. Content of the message to be sent instead of the video animation
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'mpeg4_url' => 'string',
        'mpeg4_width' => 'integer',
        'mpeg4_height' => 'integer',
        'mpeg4_duration' => 'integer',
        'thumbnail_url' => 'string',
        'thumbnail_mime_type' => 'string',
        'title' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
