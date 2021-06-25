<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object contains information about one member of a chat.
 *
 * @property User   $user                      Information about the user
 * @property string $status                    The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
 * @property string $custom_title              _Optional_. Owner and administrators only. Custom title for this user
 * @property int    $until_date                _Optional_. Restricted and kicked only. Date when restrictions will be lifted for this user; unix time
 * @property bool   $is_anonymous              _Optional_. Owner and administrators only. True, if the user's presence in the chat is hidden
 * @property bool   $can_be_edited             _Optional_. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
 * @property bool   $can_post_messages         _Optional_. Administrators only. True, if the administrator can post in the channel; channels only
 * @property bool   $can_edit_messages         _Optional_. Administrators only. True, if the administrator can edit messages of other users and can pin messages; channels only
 * @property bool   $can_delete_messages       _Optional_. Administrators only. True, if the administrator can delete messages of other users
 * @property bool   $can_restrict_members      _Optional_. Administrators only. True, if the administrator can restrict, ban or unban chat members
 * @property bool   $can_promote_members       _Optional_. Administrators only. True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property bool   $can_change_info           _Optional_. Administrators and restricted only. True, if the user is allowed to change the chat title, photo and other settings
 * @property bool   $can_invite_users          _Optional_. Administrators and restricted only. True, if the user is allowed to invite new users to the chat
 * @property bool   $can_pin_messages          _Optional_. Administrators and restricted only. True, if the user is allowed to pin messages; groups and supergroups only
 * @property bool   $is_member                 _Optional_. Restricted only. True, if the user is a member of the chat at the moment of the request
 * @property bool   $can_send_messages         _Optional_. Restricted only. True, if the user is allowed to send text messages, contacts, locations and venues
 * @property bool   $can_send_media_messages   _Optional_. Restricted only. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes
 * @property bool   $can_send_polls            _Optional_. Restricted only. True, if the user is allowed to send polls
 * @property bool   $can_send_other_messages   _Optional_. Restricted only. True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property bool   $can_add_web_page_previews _Optional_. Restricted only. True, if the user is allowed to add web page previews to their messages
 */
class ChatMember extends TelegramObject
{
    # WARN: The docs for chat member object was updated on 5.3 https://core.telegram.org/bots/api#chatmember
    # This still works though.
    protected function relations()
    {
        return [
            'user' => User::class,
            'status' => 'string',
            'custom_title' => 'string',
            'until_date' => 'integer',
            'is_anonymous' => 'boolean',
            'can_be_edited' => 'boolean',
            'can_manage_chat' => 'boolean',
            'can_post_messages' => 'boolean',
            'can_edit_messages' => 'boolean',
            'can_delete_messages' => 'boolean',
            'can_manage_voice_chats ' => 'boolean',
            'can_restrict_members' => 'boolean',
            'can_promote_members' => 'boolean',
            'can_change_info' => 'boolean',
            'can_invite_users' => 'boolean',
            'can_pin_messages' => 'boolean',
            'is_member' => 'boolean',
            'can_send_messages' => 'boolean',
            'can_send_media_messages' => 'boolean',
            'can_send_polls' => 'boolean',
            'can_send_other_messages' => 'boolean',
            'can_add_web_page_previews' => 'boolean',
        ];
    }
}
