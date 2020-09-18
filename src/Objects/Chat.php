<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a chat.
 *
 * @property Integer            $id                         Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property String             $type                       Type of chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property String             $title                      _Optional_. Title, for supergroups, channels and group chats
 * @property String             $username                   _Optional_. Username, for private chats, supergroups and channels if available
 * @property String             $first_name                 _Optional_. First name of the other party in a private chat
 * @property String             $last_name                  _Optional_. Last name of the other party in a private chat
 * @property ChatPhoto          $photo                      _Optional_. Chat photo. Returned only in getChat.
 * @property String             $description                _Optional_. Description, for groups, supergroups and channel chats. Returned only in getChat.
 * @property String             $invite_link                _Optional_. Chat invite link, for groups, supergroups and channel chats. Each administrator in a chat generates their own invite links, so the bot must first generate the link using exportChatInviteLink. Returned only in getChat.
 * @property Message            $pinned_message             _Optional_. Pinned message, for groups, supergroups and channels. Returned only in getChat.
 * @property ChatPermissions    $permissions                _Optional_. Default chat member permissions, for groups and supergroups. Returned only in getChat.
 * @property Integer            $slow_mode_delay            _Optional_. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user. Returned only in getChat.
 * @property String             $sticker_set_name           _Optional_. For supergroups, name of group sticker set. Returned only in getChat.
 * @property Boolean            $can_set_sticker_set        _Optional_. True, if the bot can change the group sticker set. Returned only in getChat.
 *
 * @package WeStacks\TeleBot\Objects
 */

class Chat extends TelegramObject
{
    protected function relations()
    {
        return [
            'id'                        => 'integer',
            'type'                      => 'string',
            'title'                     => 'string',
            'username'                  => 'string',
            'first_name'                => 'string',
            'last_name'                 => 'string',
            'photo'                     => ChatPhoto::class,
            'description'               => 'string',
            'invite_link'               => 'string',
            'pinned_message'            => Message::class,
            'permissions'               => ChatPermissions::class,
            'slow_mode_delay'           => 'integer',
            'sticker_set_name'          => 'string',
            'can_set_sticker_set'       => 'boolean'
        ];
    }
}
