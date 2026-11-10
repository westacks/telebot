<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an incoming query from a widget in a message sent by the bot or via the bot. Use answerWidgetQuery to answer the query. Each user can send at most 5 queries per 5 seconds to the bot from all its widgets.
 * @property-read string $id Unique identifier for this query
 * @property-read User $from Sender
 * @property-read ?Chat $chat Optional. Chat with the message containing the widget; omitted if the widget is in an inline message
 * @property-read ?int $message_id Optional. Identifier of the message containing the widget; omitted if the widget is in an inline message
 * @property-read ?string $inline_message_id Optional. Identifier of the inline message containing the widget
 * @property-read string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the widget was sent
 * @property-read ?string $chat_type Optional. For widgets in inline messages, type of the chat to which the message was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”.
 * @property-read WidgetQueryType $type Type of the query
 * @property-read string $data Data of the query, 1-64 bytes
 * @property-read ?string $widget_id Optional. Unique identifier of the shared widget, which sent the query; omitted if the widget isn't shared
 *
 * @see https://core.telegram.org/bots/api#widgetquery
 */
class WidgetQuery extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly ?Chat $chat,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
        public readonly string $chat_instance,
        public readonly ?string $chat_type,
        public readonly WidgetQueryType $type,
        public readonly string $data,
        public readonly ?string $widget_id,
    ) {
    }
}
