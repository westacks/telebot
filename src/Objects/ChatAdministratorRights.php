<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents the rights of an administrator in a chat.
 * @property-read bool $is_anonymous True, if the user's presence in the chat is hidden
 * @property-read bool $can_manage_chat True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages, ignore slow mode, and send messages to the chat without paying Telegram Stars. Implied by any other administrator privilege.
 * @property-read bool $can_delete_messages True, if the administrator can delete messages of other users
 * @property-read bool $can_manage_video_chats True, if the administrator can manage video chats
 * @property-read bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
 * @property-read bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property-read bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @property-read bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @property-read bool $can_post_stories True, if the administrator can post stories to the chat
 * @property-read bool $can_edit_stories True, if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
 * @property-read bool $can_delete_stories True, if the administrator can delete stories posted by other users
 * @property-read ?bool $can_post_messages Optional. True, if the administrator can post messages in the channel, approve suggested posts, or access channel statistics; for channels only
 * @property-read ?bool $can_edit_messages Optional. True, if the administrator can edit messages of other users and can pin messages; for channels only
 * @property-read ?bool $can_pin_messages Optional. True, if the user is allowed to pin messages; for groups and supergroups only
 * @property-read ?bool $can_manage_topics Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
 *
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 */
class ChatAdministratorRights extends TelegramObject
{
    public function __construct(
        public readonly bool $is_anonymous,
        public readonly bool $can_manage_chat,
        public readonly bool $can_delete_messages,
        public readonly bool $can_manage_video_chats,
        public readonly bool $can_restrict_members,
        public readonly bool $can_promote_members,
        public readonly bool $can_change_info,
        public readonly bool $can_invite_users,
        public readonly bool $can_post_stories,
        public readonly bool $can_edit_stories,
        public readonly bool $can_delete_stories,
        public readonly ?bool $can_post_messages,
        public readonly ?bool $can_edit_messages,
        public readonly ?bool $can_pin_messages,
        public readonly ?bool $can_manage_topics,
    ) {
    }
}
