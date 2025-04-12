<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 * @property-read string $status The member's status in the chat, always “restricted”
 * @property-read User $user Information about the user
 * @property-read bool $is_member True, if the user is a member of the chat at the moment of the request
 * @property-read bool $can_send_messages True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
 * @property-read bool $can_send_audios True, if the user is allowed to send audios
 * @property-read bool $can_send_documents True, if the user is allowed to send documents
 * @property-read bool $can_send_photos True, if the user is allowed to send photos
 * @property-read bool $can_send_videos True, if the user is allowed to send videos
 * @property-read bool $can_send_video_notes True, if the user is allowed to send video notes
 * @property-read bool $can_send_voice_notes True, if the user is allowed to send voice notes
 * @property-read bool $can_send_polls True, if the user is allowed to send polls
 * @property-read bool $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property-read bool $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
 * @property-read bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @property-read bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @property-read bool $can_pin_messages True, if the user is allowed to pin messages
 * @property-read bool $can_manage_topics True, if the user is allowed to create forum topics
 * @property-read int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
 *
 * @see https://core.telegram.org/bots/api#chatmemberrestricted
 */
class ChatMemberRestricted extends ChatMember
{
    public function __construct(
        public readonly string $status,
        public readonly User $user,
        public readonly bool $is_member,
        public readonly bool $can_send_messages,
        public readonly bool $can_send_audios,
        public readonly bool $can_send_documents,
        public readonly bool $can_send_photos,
        public readonly bool $can_send_videos,
        public readonly bool $can_send_video_notes,
        public readonly bool $can_send_voice_notes,
        public readonly bool $can_send_polls,
        public readonly bool $can_send_other_messages,
        public readonly bool $can_add_web_page_previews,
        public readonly bool $can_change_info,
        public readonly bool $can_invite_users,
        public readonly bool $can_pin_messages,
        public readonly bool $can_manage_topics,
        public readonly int $until_date,
    ) {
    }
}
