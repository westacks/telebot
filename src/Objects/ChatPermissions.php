<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 * @property-read ?bool $can_send_messages Optional. True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
 * @property-read ?bool $can_send_audios Optional. True, if the user is allowed to send audios
 * @property-read ?bool $can_send_documents Optional. True, if the user is allowed to send documents
 * @property-read ?bool $can_send_photos Optional. True, if the user is allowed to send photos
 * @property-read ?bool $can_send_videos Optional. True, if the user is allowed to send videos
 * @property-read ?bool $can_send_video_notes Optional. True, if the user is allowed to send video notes
 * @property-read ?bool $can_send_voice_notes Optional. True, if the user is allowed to send voice notes
 * @property-read ?bool $can_send_polls Optional. True, if the user is allowed to send polls
 * @property-read ?bool $can_send_other_messages Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property-read ?bool $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages
 * @property-read ?bool $can_change_info Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
 * @property-read ?bool $can_invite_users Optional. True, if the user is allowed to invite new users to the chat
 * @property-read ?bool $can_pin_messages Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
 * @property-read ?bool $can_manage_topics Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends TelegramObject
{
    public function __construct(
        public readonly ?bool $can_send_messages,
        public readonly ?bool $can_send_audios,
        public readonly ?bool $can_send_documents,
        public readonly ?bool $can_send_photos,
        public readonly ?bool $can_send_videos,
        public readonly ?bool $can_send_video_notes,
        public readonly ?bool $can_send_voice_notes,
        public readonly ?bool $can_send_polls,
        public readonly ?bool $can_send_other_messages,
        public readonly ?bool $can_add_web_page_previews,
        public readonly ?bool $can_change_info,
        public readonly ?bool $can_invite_users,
        public readonly ?bool $can_pin_messages,
        public readonly ?bool $can_manage_topics,
    ) {
    }
}
