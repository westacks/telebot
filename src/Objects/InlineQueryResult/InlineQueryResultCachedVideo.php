<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 * 
 * @property String                    $type                        Type of the result, must be video
 * @property String                    $id                          Unique identifier for this result, 1-64 bytes
 * @property String                    $video_file_id               A valid file identifier for the video file
 * @property String                    $title                       Title for the result
 * @property String                    $description                 _Optional_. Short description of the result
 * @property String                    $caption                     _Optional_. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property String                    $parse_mode                  _Optional_. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property InlineKeyboardMarkup      $reply_markup                _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent       $input_message_content       _Optional_. Content of the message to be sent instead of the video
 * 
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'video_file_id'         => 'string',
            'title'                 => 'string',
            'description'           => 'string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}