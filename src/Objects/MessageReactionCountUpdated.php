<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 *
 * @property Chat            $chat       The chat containing the message
 * @property int             $message_id Unique message identifier inside the chat
 * @property int             $date       Date of the change in Unix time
 * @property ReactionCount[] $reactions  List of reactions that are present on the message
 */
class MessageReactionCountUpdated extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'message_id' => 'integer',
        'date' => 'integer',
        'reactions' => 'ReactionCount[]',
    ];
}
