<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object contains information about one member of a chat.
 * 
 * @property User                    $user                            Information about the user
 * @property String                  $status                          The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
 * @property String                  $custom_title                    _Optional_. Owner and administrators only. Custom title for this user
 * @property Integer                 $until_date                      _Optional_. Restricted and kicked only. Date when restrictions will be lifted for this user; unix time
 * @property Boolean                 $can_be_edited                   _Optional_. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
 * @property Boolean                 $can_post_messages               _Optional_. Administrators only. True, if the administrator can post in the channel; channels only
 * @property Boolean                 $can_edit_messages               _Optional_. Administrators only. True, if the administrator can edit messages of other users and can pin messages; channels only
 * @property Boolean                 $can_delete_messages             _Optional_. Administrators only. True, if the administrator can delete messages of other users
 * @property Boolean                 $can_restrict_members            _Optional_. Administrators only. True, if the administrator can restrict, ban or unban chat members
 * @property Boolean                 $can_promote_members             _Optional_. Administrators only. True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property Boolean                 $can_change_info                 _Optional_. Administrators and restricted only. True, if the user is allowed to change the chat title, photo and other settings
 * @property Boolean                 $can_invite_users                _Optional_. Administrators and restricted only. True, if the user is allowed to invite new users to the chat
 * @property Boolean                 $can_pin_messages                _Optional_. Administrators and restricted only. True, if the user is allowed to pin messages; groups and supergroups only
 * @property Boolean                 $is_member                       _Optional_. Restricted only. True, if the user is a member of the chat at the moment of the request
 * @property Boolean                 $can_send_messages               _Optional_. Restricted only. True, if the user is allowed to send text messages, contacts, locations and venues
 * @property Boolean                 $can_send_media_messages         _Optional_. Restricted only. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes
 * @property Boolean                 $can_send_polls                  _Optional_. Restricted only. True, if the user is allowed to send polls
 * @property Boolean                 $can_send_other_messages         _Optional_. Restricted only. True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property Boolean                 $can_add_web_page_previews       _Optional_. Restricted only. True, if the user is allowed to add web page previews to their messages
 * 
 * @package WeStacks\TeleBot\TelegramObject
 */

class ChatMember extends TelegramObject
{
    protected function relations()
    {
        return [
            'user'                      => User::class,
            'status'                    => 'string',
            'custom_title'              => 'string',
            'until_date'                => 'integer',
            'can_be_edited'             => 'boolean',
            'can_post_messages'         => 'boolean',
            'can_edit_messages'         => 'boolean',
            'can_delete_messages'       => 'boolean',
            'can_restrict_members'      => 'boolean',
            'can_promote_members'       => 'boolean',
            'can_change_info'           => 'boolean',
            'can_invite_users'          => 'boolean',
            'can_pin_messages'          => 'boolean',
            'is_member'                 => 'boolean',
            'can_send_messages'         => 'boolean',
            'can_send_media_messages'   => 'boolean',
            'can_send_polls'            => 'boolean',
            'can_send_other_messages'   => 'boolean',
            'can_add_web_page_previews' => 'boolean'
        ];
    }
}