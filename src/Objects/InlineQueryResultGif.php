<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 * @property-read string $type Type of the result, must be gif
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $gif_url A valid URL for the GIF file
 * @property-read ?int $gif_width Optional. Width of the GIF
 * @property-read ?int $gif_height Optional. Height of the GIF
 * @property-read ?int $gif_duration Optional. Duration of the GIF in seconds
 * @property-read string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property-read ?string $thumbnail_mime_type Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
 * @property-read ?string $title Optional. Title for the result
 * @property-read ?string $caption Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the GIF animation
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgif
 */
class InlineQueryResultGif extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $gif_url,
        public readonly ?int $gif_width,
        public readonly ?int $gif_height,
        public readonly ?int $gif_duration,
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
