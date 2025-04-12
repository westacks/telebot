<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 * @property-read string $type Type of the result, must be mpeg4_gif
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $mpeg4_url A valid URL for the MPEG4 file
 * @property-read ?int $mpeg4_width Optional. Video width
 * @property-read ?int $mpeg4_height Optional. Video height
 * @property-read ?int $mpeg4_duration Optional. Video duration in seconds
 * @property-read string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property-read ?string $thumbnail_mime_type Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
 * @property-read ?string $title Optional. Title for the result
 * @property-read ?string $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the video animation
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $mpeg4_url,
        public readonly ?int $mpeg4_width,
        public readonly ?int $mpeg4_height,
        public readonly ?int $mpeg4_duration,
        public readonly string $thumbnail_url,
        public readonly ?string $thumbnail_mime_type,
        public readonly ?string $title,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
    ) {
    }
}
