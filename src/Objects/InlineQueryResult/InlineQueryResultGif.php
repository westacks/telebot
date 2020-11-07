<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string               $type                  Type of the result, must be gif
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $gif_url               A valid URL for the GIF file. File size must not exceed 1MB
 * @property int                  $gif_width             _Optional_. Width of the GIF
 * @property int                  $gif_height            _Optional_. Height of the GIF
 * @property int                  $gif_duration          _Optional_. Duration of the GIF
 * @property string               $thumb_url             URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property string               $thumb_mime_type       _Optional_. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
 * @property string               $title                 _Optional_. Title for the result
 * @property string               $caption               _Optional_. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the caption. See formatting options for more details.
 * @property Array<MessageEntity> $caption_entities      _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the GIF animation
 */
class InlineQueryResultGif extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'gif_url' => 'string',
            'gif_width' => 'integer',
            'gif_height' => 'integer',
            'gif_duration' => 'integer',
            'thumb_url' => 'string',
            'thumb_mime_type' => 'string',
            'title' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
