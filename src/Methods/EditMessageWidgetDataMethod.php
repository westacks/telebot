<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to edit data of a widget in a message sent by the bot or via the bot (for inline bots). Public data of a shared widget can be changed at most once per second. On success, True is returned.
 *
 * @property-read null|int|string $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target supergroup in the format @username.
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the message with the widget.
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message.
 * @property-read ?string $public_data New public data of the widget, 0-1024 bytes; pass an empty string to remove the public data. If omitted, then the public data isn't changed.
 * @property-read ?string $chat_data New data of the widget, which is specific to the message, 0-1024 bytes; pass an empty string to remove the data. If omitted, then the data isn't changed.
 *
 * @see https://core.telegram.org/bots/api#editmessagewidgetdata
 */
class EditMessageWidgetDataMethod extends TelegramMethod
{
    protected string $method = 'editMessageWidgetData';
    protected array $expect = ['true'];

    public function __construct(
        public readonly null|int|string $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
        public readonly ?string $public_data,
        public readonly ?string $chat_data,
    ) {
    }
}
