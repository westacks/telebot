<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent by an unknown user.
 *
 * @property string $type             Type of the message origin, always “hidden_user”
 * @property int    $date             Date the message was sent originally in Unix time
 * @property string $sender_user_name Name of the user that sent the message originally
 */
class MessageOriginHiddenUser extends MessageOrigin
{
    protected $attributes = [
        'type' => 'string',
        'date' => 'integer',
        'sender_user_name' => 'string',
    ];
}
