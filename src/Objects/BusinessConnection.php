<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes the connection of the bot with a business account.
 *
 * @property string $id           Unique identifier of the business connection
 * @property User   $user         Business account user that created the business connection
 * @property int    $user_chat_id Identifier of a private chat with the user who created the business connection. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property int    $date         Date the connection was established in Unix time
 * @property bool   $can_reply    True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours
 * @property bool   $is_enabled   True, if the connection is active
 */
class BusinessConnection extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'user' => 'User',
        'user_chat_id' => 'integer',
        'date' => 'integer',
        'can_reply' => 'boolean',
        'is_enabled' => 'boolean',
    ];
}
