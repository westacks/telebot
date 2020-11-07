<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a chat.
 *
 * @property int             $id                  Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property string          $type                Type of chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property string          $title               _Optional_. Title, for supergroups, channels and group chats
 * @property string          $username            _Optional_. Username, for private chats, supergroups and channels if available
 * @property string          $first_name          _Optional_. First name of the other party in a private chat
 * @property string          $last_name           _Optional_. Last name of the other party in a private chat
 * @property ChatPhoto       $photo               _Optional_. Chat photo. Returned only in getChat.
 * @property string          $bio                 _Optional_. Bio of the other party in a private chat. Returned only in getChat.
 * @property string          $description         _Optional_. Description, for groups, supergroups and channel chats. Returned only in getChat.
 * @property string          $invite_link         _Optional_. Chat invite link, for groups, supergroups and channel chats. Each administrator in a chat generates their own invite links, so the bot must first generate the link using exportChatInviteLink. Returned only in getChat.
 * @property Message         $pinned_message      _Optional_. The most recent pinned message (by sending date). Returned only in getChat.
 * @property ChatPermissions $permissions         _Optional_. Default chat member permissions, for groups and supergroups. Returned only in getChat.
 * @property int             $slow_mode_delay     _Optional_. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user. Returned only in getChat.
 * @property string          $sticker_set_name    _Optional_. For supergroups, name of group sticker set. Returned only in getChat.
 * @property bool            $can_set_sticker_set _Optional_. True, if the bot can change the group sticker set. Returned only in getChat.
 * @property int             $linked_chat_id      _Optional_. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
 * @property ChatLocation    $location            _Optional_. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
 */
class Chat extends TelegramObject
{
    protected function relations()
    {
        return [
            'id' => 'integer',
            'type' => 'string',
            'title' => 'string',
            'username' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'photo' => ChatPhoto::class,
            'bio' => 'string',
            'description' => 'string',
            'invite_link' => 'string',
            'pinned_message' => Message::class,
            'permissions' => ChatPermissions::class,
            'slow_mode_delay' => 'integer',
            'sticker_set_name' => 'string',
            'can_set_sticker_set' => 'boolean',
            'linked_chat_id' => 'integer',
            'location' => ChatLocation::class,
        ];
    }
}
