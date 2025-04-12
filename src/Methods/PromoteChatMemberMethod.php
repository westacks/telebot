<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?bool $is_anonymous Pass True if the administrator's presence in the chat is hidden
 * @property-read ?bool $can_manage_chat Pass True if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
 * @property-read ?bool $can_delete_messages Pass True if the administrator can delete messages of other users
 * @property-read ?bool $can_manage_video_chats Pass True if the administrator can manage video chats
 * @property-read ?bool $can_restrict_members Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics
 * @property-read ?bool $can_promote_members Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him)
 * @property-read ?bool $can_change_info Pass True if the administrator can change chat title, photo and other settings
 * @property-read ?bool $can_invite_users Pass True if the administrator can invite new users to the chat
 * @property-read ?bool $can_post_stories Pass True if the administrator can post stories to the chat
 * @property-read ?bool $can_edit_stories Pass True if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
 * @property-read ?bool $can_delete_stories Pass True if the administrator can delete stories posted by other users
 * @property-read ?bool $can_post_messages Pass True if the administrator can post messages in the channel, or access channel statistics; for channels only
 * @property-read ?bool $can_edit_messages Pass True if the administrator can edit messages of other users and can pin messages; for channels only
 * @property-read ?bool $can_pin_messages Pass True if the administrator can pin messages; for supergroups only
 * @property-read ?bool $can_manage_topics Pass True if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
 *
 * @see https://core.telegram.org/bots/api#promotechatmember
 */
class PromoteChatMemberMethod extends TelegramMethod
{
    protected string $method = 'promoteChatMember';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
        public readonly ?bool $is_anonymous,
        public readonly ?bool $can_manage_chat,
        public readonly ?bool $can_delete_messages,
        public readonly ?bool $can_manage_video_chats,
        public readonly ?bool $can_restrict_members,
        public readonly ?bool $can_promote_members,
        public readonly ?bool $can_change_info,
        public readonly ?bool $can_invite_users,
        public readonly ?bool $can_post_stories,
        public readonly ?bool $can_edit_stories,
        public readonly ?bool $can_delete_stories,
        public readonly ?bool $can_post_messages,
        public readonly ?bool $can_edit_messages,
        public readonly ?bool $can_pin_messages,
        public readonly ?bool $can_manage_topics,
    ) {
    }
}
