<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.  If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you __must__ replace its content using input_message_content.
 *
 * @property string                                                                                                  $type                     Type of the result, must be video
 * @property string                                                                                                  $id                       Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $video_url                A valid URL for the embedded video player or video file
 * @property string                                                                                                  $mime_type                MIME type of the content of the video URL, “text/html” or “video/mp4”
 * @property string                                                                                                  $thumbnail_url            URL of the thumbnail (JPEG only) for the video
 * @property string                                                                                                  $title                    Title for the result
 * @property string                                                                                                  $caption                  Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property string                                                                                                  $parse_mode               Optional. Mode for parsing entities in the video caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]                                                                                         $caption_entities         Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool                                                                                                    $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property int                                                                                                     $video_width              Optional. Video width
 * @property int                                                                                                     $video_height             Optional. Video height
 * @property int                                                                                                     $video_duration           Optional. Video duration in seconds
 * @property string                                                                                                  $description              Optional. Short description of the result
 * @property InlineKeyboardMarkup                                                                                    $reply_markup             Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content    Optional. Content of the message to be sent instead of the video. This field is __required__ if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'video_url' => 'string',
        'mime_type' => 'string',
        'thumbnail_url' => 'string',
        'title' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'video_width' => 'integer',
        'video_height' => 'integer',
        'video_duration' => 'integer',
        'description' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
