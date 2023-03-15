<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string               $type                  Type of the result, must be gif
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $gif_url               A valid URL for the GIF file. File size must not exceed 1MB
 * @property int                  $gif_width             Optional. Width of the GIF
 * @property int                  $gif_height            Optional. Height of the GIF
 * @property int                  $gif_duration          Optional. Duration of the GIF in seconds
 * @property string               $thumbnail_url         URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property string               $thumbnail_mime_type   Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
 * @property string               $title                 Optional. Title for the result
 * @property string               $caption               Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property MessageEntity[]      $caption_entities      Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup $reply_markup          Optional. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content Optional. Content of the message to be sent instead of the GIF animation
 */
class InlineQueryResultGif extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'gif_url' => 'string',
        'gif_width' => 'integer',
        'gif_height' => 'integer',
        'gif_duration' => 'integer',
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
