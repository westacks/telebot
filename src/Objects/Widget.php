<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes an HTML widget.
 * @property-read ?string $id Optional. Unique identifier of the shared widget, which can be used to send the widget again using the method sendSharedWidget; omitted if the widget isn't shared
 * @property-read ?int $width Optional. Width of the widget in logical pixels; omitted if the widget must occupy the whole width of the message bubble
 * @property-read ?int $height Optional. Height of the widget in logical pixels; omitted if the height of the widget isn't fixed
 * @property-read string $html HTML code of the widget
 * @property-read ?string $public_data Optional. Public data of the widget, which is available wherever the widget is shown. All messages with a shared widget have the same public data.
 * @property-read ?string $chat_data Optional. Data of the widget, which is specific to the message
 *
 * @see https://core.telegram.org/bots/api#widget
 */
class Widget extends TelegramObject
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?int $width,
        public readonly ?int $height,
        public readonly string $html,
        public readonly ?string $public_data,
        public readonly ?string $chat_data,
    ) {
    }
}
