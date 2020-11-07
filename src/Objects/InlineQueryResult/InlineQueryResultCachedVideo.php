<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 *
 * @property string               $type                  Type of the result, must be video
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $video_file_id         A valid file identifier for the video file
 * @property string               $title                 Title for the result
 * @property string               $description           _Optional_. Short description of the result
 * @property string               $caption               _Optional_. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property Array<MessageEntity> $caption_entities      _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the video
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'video_file_id' => 'string',
            'title' => 'string',
            'description' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
