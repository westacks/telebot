<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The message was originally sent by a known user.
 *
 * @property string $type        Type of the message origin, always “user”
 * @property int    $date        Date the message was sent originally in Unix time
 * @property User   $sender_user User that sent the message originally
 */
class MessageOriginUser extends MessageOrigin
{
    protected $attributes = [
        'type' => 'string',
        'date' => 'integer',
        'sender_user' => 'User',
    ];
}
