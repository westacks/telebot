<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a chat.
 *
 * @property int    $id         Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property string $type       Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property string $title      Optional. Title, for supergroups, channels and group chats
 * @property string $username   Optional. Username, for private chats, supergroups and channels if available
 * @property string $first_name Optional. First name of the other party in a private chat
 * @property string $last_name  Optional. Last name of the other party in a private chat
 * @property bool   $is_forum   Optional. True, if the supergroup chat is a forum (has [topics](https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups) enabled)
 */
class Chat extends TelegramObject
{
    protected $attributes = [
        'id' => 'integer',
        'type' => 'string',
        'title' => 'string',
        'username' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_forum' => 'boolean',
    ];
}
