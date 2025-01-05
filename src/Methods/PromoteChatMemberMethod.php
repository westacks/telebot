<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 *
 * @property string $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $user_id                __Required: Yes__. Unique identifier of the target user
 * @property bool   $is_anonymous           __Required: Optional__. Pass True if the administrator's presence in the chat is hidden
 * @property bool   $can_manage_chat        __Required: Optional__. Pass True if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
 * @property bool   $can_delete_messages    __Required: Optional__. Pass True if the administrator can delete messages of other users
 * @property bool   $can_manage_video_chats __Required: Optional__. Pass True if the administrator can manage video chats
 * @property bool   $can_restrict_members   __Required: Optional__. Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics
 * @property bool   $can_promote_members    __Required: Optional__. Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him)
 * @property bool   $can_change_info        __Required: Optional__. Pass True if the administrator can change chat title, photo and other settings
 * @property bool   $can_invite_users       __Required: Optional__. Pass True if the administrator can invite new users to the chat
 * @property bool   $can_post_stories       __Required: Optional__. Pass True if the administrator can post stories to the chat
 * @property bool   $can_edit_stories       __Required: Optional__. Pass True if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
 * @property bool   $can_delete_stories     __Required: Optional__. Pass True if the administrator can delete stories posted by other users
 * @property bool   $can_post_messages      __Required: Optional__. Pass True if the administrator can post messages in the channel, or access channel statistics; for channels only
 * @property bool   $can_edit_messages      __Required: Optional__. Pass True if the administrator can edit messages of other users and can pin messages; for channels only
 * @property bool   $can_pin_messages       __Required: Optional__. Pass True if the administrator can pin messages; for supergroups only
 * @property bool   $can_manage_topics      __Required: Optional__. Pass True if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
 */
class PromoteChatMemberMethod extends TelegramMethod
{
    protected string $method = 'promoteChatMember';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
        'is_anonymous' => 'boolean',
        'can_manage_chat' => 'boolean',
        'can_delete_messages' => 'boolean',
        'can_manage_video_chats' => 'boolean',
        'can_restrict_members' => 'boolean',
        'can_promote_members' => 'boolean',
        'can_change_info' => 'boolean',
        'can_invite_users' => 'boolean',
        'can_post_stories' => 'boolean',
        'can_edit_stories' => 'boolean',
        'can_delete_stories' => 'boolean',
        'can_post_messages' => 'boolean',
        'can_edit_messages' => 'boolean',
        'can_pin_messages' => 'boolean',
        'can_manage_topics' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
