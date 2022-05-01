<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers. By default, this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string               $type                  Type of the result, must be mpeg4_gif
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $mpeg4_file_id         A valid file identifier for the MP4 file
 * @property string               $title                 Optional. Title for the result
 * @property string               $caption               Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property MessageEntity[]      $caption_entities      Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup $reply_markup          Optional. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content Optional. Content of the message to be sent instead of the video animation
 */
class InlineQueryResultCachedMpeg4Gif extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'mpeg4_file_id' => 'string',
        'title' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
