<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 * @property-read string $type Type of the result, must be video
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $video_file_id A valid file identifier for the video file
 * @property-read string $title Title for the result
 * @property-read ?string $description Optional. Short description of the result
 * @property-read ?string $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the video
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $video_file_id,
        public readonly string $title,
        public readonly ?string $description,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
    ) {
    }
}
