<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @property string $type             Type of the message origin, always “chat”
 * @property int    $date             Date the message was sent originally in Unix time
 * @property Chat   $sender_chat      Chat that sent the message originally
 * @property string $author_signature Optional. For messages originally sent by an anonymous chat administrator, original message author signature
 */
class MessageOriginChat extends MessageOrigin
{
    protected $attributes = [
        'type' => 'string',
        'date' => 'integer',
        'sender_chat' => 'Chat',
        'author_signature' => 'string',
    ];
}
