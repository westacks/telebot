<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of a message with an HTML widget to be sent as the result of an inline query. Currently, widgets can't be sent in response to inline queries in the production environment.
 * @property-read string $html HTML code of the widget, 1-32768 bytes. The code must not exceed 4096 bytes when compressed by zlib with the maximum compression level.
 * @property-read ?int $width Optional. Width of the widget in logical pixels; omit if the widget must occupy the whole width of the message bubble. The width is clamped by the app to the range from 200 to the maximum width of the message bubble.
 * @property-read ?int $height Optional. Height of the widget in logical pixels; omit if the height of the widget isn't fixed. The height is clamped by the app to the range 50-600.
 * @property-read ?string $public_data Optional. Public data of the widget, 0-1024 bytes, which will be available wherever the widget is shown. If the widget is shared, then all messages with it will have the same public data.
 * @property-read ?string $chat_data Optional. Data of the widget, which is specific to the message, 0-1024 bytes
 * @property-read ?string $caption Optional. Widget caption, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the widget caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the widget
 * @property-read ?bool $allow_queries Optional. Pass True to allow the widget to send queries to the bot
 * @property-read ?bool $is_shared Optional. Pass True to create a shared widget. Each message sent from the result creates a separate shared widget, whose identifier is received by the bot only in the field widget_id of queries from the widget. To send an existing shared widget in response to an inline query, use InputSharedWidgetMessageContent instead.
 *
 * @see https://core.telegram.org/bots/api#inputwidgetmessagecontent
 */
class InputWidgetMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly string $html,
        public readonly ?int $width,
        public readonly ?int $height,
        public readonly ?string $public_data,
        public readonly ?string $chat_data,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?bool $allow_queries,
        public readonly ?bool $is_shared,
    ) {
    }
}
