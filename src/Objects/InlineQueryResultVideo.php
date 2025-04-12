<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 * @property-read string $type Type of the result, must be video
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $video_url A valid URL for the embedded video player or video file
 * @property-read string $mime_type MIME type of the content of the video URL, “text/html” or “video/mp4”
 * @property-read string $thumbnail_url URL of the thumbnail (JPEG only) for the video
 * @property-read string $title Title for the result
 * @property-read ?string $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property-read ?int $video_width Optional. Video width
 * @property-read ?int $video_height Optional. Video height
 * @property-read ?int $video_duration Optional. Video duration in seconds
 * @property-read ?string $description Optional. Short description of the result
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $video_url,
        public readonly string $mime_type,
        public readonly string $thumbnail_url,
        public readonly string $title,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?int $video_width,
        public readonly ?int $video_height,
        public readonly ?int $video_duration,
        public readonly ?string $description,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
    ) {
    }
}
