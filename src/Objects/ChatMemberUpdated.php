<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents changes in the status of a chat member.
 *
 * @property Chat                                                                                                          $chat                        Chat the user belongs to
 * @property User                                                                                                          $from                        Performer of the action, which resulted in the change
 * @property int                                                                                                           $date                        Date the change was done in Unix time
 * @property ChatMemberAdministrator|ChatMemberBanned|ChatMemberLeft|ChatMemberMember|ChatMemberOwner|ChatMemberRestricted $old_chat_member             Previous information about the chat member
 * @property ChatMemberAdministrator|ChatMemberBanned|ChatMemberLeft|ChatMemberMember|ChatMemberOwner|ChatMemberRestricted $new_chat_member             New information about the chat member
 * @property ChatInviteLink                                                                                                $invite_link                 Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 * @property bool                                                                                                          $via_join_request            Optional. True, if the user joined the chat after sending a direct join request without using an invite link and being approved by an administrator
 * @property bool                                                                                                          $via_chat_folder_invite_link Optional. True, if the user joined the chat via a chat folder invite link
 */
class ChatMemberUpdated extends TelegramObject
{
    protected $attributes = [
        'chat' => 'Chat',
        'from' => 'User',
        'date' => 'integer',
        'old_chat_member' => 'ChatMember',
        'new_chat_member' => 'ChatMember',
        'invite_link' => 'ChatInviteLink',
        'via_join_request' => 'boolean',
        'via_chat_folder_invite_link' => 'boolean',
    ];
}
