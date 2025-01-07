<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent to a channel chat.
 *
 * @property string $type             Type of the message origin, always “channel”
 * @property int    $date             Date the message was sent originally in Unix time
 * @property Chat   $chat             Channel chat to which the message was originally sent
 * @property int    $message_id       Unique message identifier inside the chat
 * @property string $author_signature Optional. Signature of the original post author
 */
class MessageOriginChannel extends MessageOrigin
{
    protected $attributes = [
        'type' => 'string',
        'date' => 'integer',
        'chat' => 'Chat',
        'message_id' => 'integer',
        'author_signature' => 'string',
    ];
}
