<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that is under certain restrictions in the chat. Supergroups only.
 *
 * @property string $status                    The member's status in the chat, always “restricted”
 * @property User   $user                      Information about the user
 * @property bool   $is_member                 True, if the user is a member of the chat at the moment of the request
 * @property bool   $can_send_messages         True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
 * @property bool   $can_send_audios           True, if the user is allowed to send audios
 * @property bool   $can_send_documents        True, if the user is allowed to send documents
 * @property bool   $can_send_photos           True, if the user is allowed to send photos
 * @property bool   $can_send_videos           True, if the user is allowed to send videos
 * @property bool   $can_send_video_notes      True, if the user is allowed to send video notes
 * @property bool   $can_send_voice_notes      True, if the user is allowed to send voice notes
 * @property bool   $can_send_polls            True, if the user is allowed to send polls
 * @property bool   $can_send_other_messages   True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property bool   $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
 * @property bool   $can_change_info           True, if the user is allowed to change the chat title, photo and other settings
 * @property bool   $can_invite_users          True, if the user is allowed to invite new users to the chat
 * @property bool   $can_pin_messages          True, if the user is allowed to pin messages
 * @property bool   $can_manage_topics         True, if the user is allowed to create forum topics
 * @property int    $until_date                Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
 */
class ChatMemberRestricted extends ChatMember
{
    protected $attributes = [
        'status' => 'string',
        'user' => 'User',
        'is_member' => 'boolean',
        'can_send_messages' => 'boolean',
        'can_send_audios' => 'boolean',
        'can_send_documents' => 'boolean',
        'can_send_photos' => 'boolean',
        'can_send_videos' => 'boolean',
        'can_send_video_notes' => 'boolean',
        'can_send_voice_notes' => 'boolean',
        'can_send_polls' => 'boolean',
        'can_send_other_messages' => 'boolean',
        'can_add_web_page_previews' => 'boolean',
        'can_change_info' => 'boolean',
        'can_invite_users' => 'boolean',
        'can_pin_messages' => 'boolean',
        'can_manage_topics' => 'boolean',
        'until_date' => 'integer',
    ];
}
