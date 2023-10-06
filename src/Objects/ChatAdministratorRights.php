<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents the rights of an administrator in a chat.
 *
 * @property bool $is_anonymous           True, if the user's presence in the chat is hidden
 * @property bool $can_manage_chat        True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * @property bool $can_delete_messages    True, if the administrator can delete messages of other users
 * @property bool $can_manage_video_chats True, if the administrator can manage video chats
 * @property bool $can_restrict_members   True, if the administrator can restrict, ban or unban chat members
 * @property bool $can_promote_members    True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property bool $can_change_info        True, if the user is allowed to change the chat title, photo and other settings
 * @property bool $can_invite_users       True, if the user is allowed to invite new users to the chat
 * @property bool $can_post_messages      Optional. True, if the administrator can post in the channel; channels only
 * @property bool $can_edit_messages      Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
 * @property bool $can_pin_messages       Optional. True, if the user is allowed to pin messages; groups and supergroups only
 * @property bool $can_post_stories       Optional. True, if the administrator can post stories in the channel; channels only
 * @property bool $can_edit_stories       Optional. True, if the administrator can edit stories posted by other users; channels only
 * @property bool $can_delete_stories     Optional. True, if the administrator can delete stories posted by other users; channels only
 * @property bool $can_manage_topics      Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
 */
class ChatAdministratorRights extends TelegramObject
{
    protected $attributes = [
        'is_anonymous' => 'boolean',
        'can_manage_chat' => 'boolean',
        'can_delete_messages' => 'boolean',
        'can_manage_video_chats' => 'boolean',
        'can_restrict_members' => 'boolean',
        'can_promote_members' => 'boolean',
        'can_change_info' => 'boolean',
        'can_invite_users' => 'boolean',
        'can_post_messages' => 'boolean',
        'can_edit_messages' => 'boolean',
        'can_pin_messages' => 'boolean',
        'can_post_stories' => 'boolean',
        'can_edit_stories' => 'boolean',
        'can_delete_stories' => 'boolean',
        'can_manage_topics' => 'boolean',
    ];
}
