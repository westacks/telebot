<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 *
 * @property string                                                                                                  $type                     Type of the result, must be video
 * @property string                                                                                                  $id                       Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $video_file_id            A valid file identifier for the video file
 * @property string                                                                                                  $title                    Title for the result
 * @property string                                                                                                  $description              Optional. Short description of the result
 * @property string                                                                                                  $caption                  Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property string                                                                                                  $parse_mode               Optional. Mode for parsing entities in the video caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]                                                                                         $caption_entities         Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool                                                                                                    $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property InlineKeyboardMarkup                                                                                    $reply_markup             Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content    Optional. Content of the message to be sent instead of the video
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'video_file_id' => 'string',
        'title' => 'string',
        'description' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
