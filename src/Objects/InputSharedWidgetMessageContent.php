<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of a message with a shared widget to be sent as the result of an inline query. Currently, widgets can't be sent in response to inline queries in the production environment.
 * @property-read string $widget_id Unique identifier of the shared widget created by the bot
 * @property-read ?string $chat_data Optional. Data of the widget, which is specific to the message, 0-1024 bytes
 * @property-read ?string $caption Optional. Widget caption, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the widget caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Optional. Pass True if the caption must be shown above the widget
 *
 * @see https://core.telegram.org/bots/api#inputsharedwidgetmessagecontent
 */
class InputSharedWidgetMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly string $widget_id,
        public readonly ?string $chat_data,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
    ) {
    }
}
