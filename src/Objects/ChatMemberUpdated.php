<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents changes in the status of a chat member.
 * @property-read Chat $chat Chat the user belongs to
 * @property-read User $from Performer of the action, which resulted in the change
 * @property-read int $date Date the change was done in Unix time
 * @property-read ChatMember $old_chat_member Previous information about the chat member
 * @property-read ChatMember $new_chat_member New information about the chat member
 * @property-read ?ChatInviteLink $invite_link Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 * @property-read ?bool $via_join_request Optional. True, if the user joined the chat after sending a direct join request without using an invite link and being approved by an administrator
 * @property-read ?bool $via_chat_folder_invite_link Optional. True, if the user joined the chat via a chat folder invite link
 *
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdated extends TelegramObject
{
    public function __construct(
        public readonly Chat $chat,
        public readonly User $from,
        public readonly int $date,
        public readonly ChatMember $old_chat_member,
        public readonly ChatMember $new_chat_member,
        public readonly ?ChatInviteLink $invite_link,
        public readonly ?bool $via_join_request,
        public readonly ?bool $via_chat_folder_invite_link,
    ) {
    }
}
