<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @property Chat $chat       Chat the message belonged to
 * @property int  $message_id Unique message identifier inside the chat
 * @property int  $date       Always 0. The field can be used to differentiate regular and inaccessible messages.
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    protected $attributes = [
        'chat' => 'Chat',
        'message_id' => 'integer',
        'date' => 'integer',
    ];
}
