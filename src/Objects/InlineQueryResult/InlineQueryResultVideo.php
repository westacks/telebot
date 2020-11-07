<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 * If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you must replace its content using input_message_content.
 *
 * @property string               $type                  Type of the result, must be video
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $video_url             A valid URL for the embedded video player or video file
 * @property string               $mime_type             Mime type of the content of video url, “text/html” or “video/mp4”
 * @property string               $thumb_url             URL of the thumbnail (jpeg only) for the video
 * @property string               $title                 Title for the result
 * @property string               $caption               _Optional_. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property Array<MessageEntity> $caption_entities      _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int                  $video_width           _Optional_. Video width
 * @property int                  $video_height          _Optional_. Video height
 * @property int                  $video_duration        _Optional_. Video duration in seconds
 * @property string               $description           _Optional_. Short description of the result
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'video_url' => 'string',
            'mime_type' => 'string',
            'thumb_url' => 'string',
            'title' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'video_width' => 'integer',
            'video_height' => 'integer',
            'video_duration' => 'integer',
            'description' => 'string',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
