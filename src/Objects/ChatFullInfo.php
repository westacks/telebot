<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a chat.
 *
 * @property int                  $id                                                     Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property string               $type                                                   Type of chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property string               $title                                                  Optional. Title, for supergroups, channels and group chats
 * @property string               $username                                               Optional. Username, for private chats, supergroups and channels if available
 * @property string               $first_name                                             Optional. First name of the other party in a private chat
 * @property string               $last_name                                              Optional. Last name of the other party in a private chat
 * @property bool                 $is_forum                                               Optional. True, if the supergroup chat is a forum (has topics enabled)
 * @property ChatPhoto            $photo                                                  Optional. Chat photo. Returned only in getChat.
 * @property string[]             $active_usernames                                       Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
 * @property Birthdate            $birthdate                                              Optional. For private chats, the date of birth of the user. Returned only in getChat.
 * @property BusinessIntro        $business_intro                                         Optional. For private chats with business accounts, the intro of the business. Returned only in getChat.
 * @property BusinessLocation     $business_location                                      Optional. For private chats with business accounts, the location of the business. Returned only in getChat.
 * @property BusinessOpeningHours $business_opening_hours                                 Optional. For private chats with business accounts, the opening hours of the business. Returned only in getChat.
 * @property Chat                 $personal_chat                                          Optional. For private chats, the personal channel of the user. Returned only in getChat.
 * @property ReactionType[]       $available_reactions                                    Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed. Returned only in getChat.
 * @property int                  $accent_color_id                                        Optional. Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header, and link preview. See accent colors for more details. Returned only in getChat. Always returned in getChat.
 * @property int                  $max_reaction_count                                     The maximum number of reactions that can be set on a message in the chat
 * @property string               $background_custom_emoji_id                             Optional. Custom emoji identifier of emoji chosen by the chat for the reply header and link preview background. Returned only in getChat.
 * @property int                  $profile_accent_color_id                                Optional. Identifier of the accent color for the chat's profile background. See profile accent colors for more details. Returned only in getChat.
 * @property string               $profile_background_custom_emoji_id                     Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background. Returned only in getChat.
 * @property string               $emoji_status_custom_emoji_id                           Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat. Returned only in getChat.
 * @property int                  $emoji_status_expiration_date                           Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time, if any. Returned only in getChat.
 * @property string               $bio                                                    Optional. Bio of the other party in a private chat. Returned only in getChat.
 * @property bool                 $has_private_forwards                                   Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id= links only in chats with the user. Returned only in getChat.
 * @property bool                 $has_restricted_voice_and_video_messages                Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
 * @property bool                 $join_to_send_messages                                  Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
 * @property bool                 $join_by_request                                        Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
 * @property string               $description                                            Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
 * @property string               $invite_link                                            Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
 * @property Message              $pinned_message                                         Optional. The most recent pinned message (by sending date). Returned only in getChat.
 * @property ChatPermissions      $permissions                                            Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
 * @property int                  $slow_mode_delay                                        Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in seconds. Returned only in getChat.
 * @property int                  $unrestrict_boost_count                                 Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to ignore slow mode and chat permissions. Returned only in getChat.
 * @property int                  $message_auto_delete_time                               Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
 * @property bool                 $has_aggressive_anti_spam_enabled                       Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
 * @property bool                 $has_hidden_members                                     Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
 * @property bool                 $has_protected_content                                  Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
 * @property bool                 $has_visible_history                                    Optional. True, if new chat members will have access to old messages; available only to chat administrators. Returned only in getChat.
 * @property string               $sticker_set_name                                       Optional. For supergroups, name of group sticker set. Returned only in getChat.
 * @property bool                 $can_set_sticker_set                                    Optional. True, if the bot can change the group sticker set. Returned only in getChat.
 * @property string               $custom_emoji_sticker_set_name                          Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be used by all users and bots in the group. Returned only in getChat.
 * @property int                  $linked_chat_id                                         Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
 * @property ChatLocation         $location                                               Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
 */
class Chat extends TelegramObject
{
    protected $attributes = [
        'id' => 'integer',
        'type' => 'string',
        'title' => 'string',
        'username' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_forum' => 'boolean',
        'photo' => 'ChatPhoto',
        'active_usernames' => 'string[]',
        'birthdate' => 'Birthdate',
        'business_intro' => 'BusinessIntro',
        'business_location' => 'BusinessLocation',
        'business_opening_hours' => 'BusinessOpeningHours',
        'personal_chat' => 'Chat',
        'available_reactions' => 'ReactionType[]',
        'accent_color_id' => 'integer',
        'max_reaction_count' => 'integer',
        'background_custom_emoji_id' => 'string',
        'profile_accent_color_id' => 'integer',
        'profile_background_custom_emoji_id' => 'string',
        'emoji_status_custom_emoji_id' => 'string',
        'emoji_status_expiration_date' => 'integer',
        'bio' => 'string',
        'has_private_forwards' => 'boolean',
        'has_restricted_voice_and_video_messages' => 'boolean',
        'join_to_send_messages' => 'boolean',
        'join_by_request' => 'boolean',
        'description' => 'string',
        'invite_link' => 'string',
        'pinned_message' => 'Message',
        'permissions' => 'ChatPermissions',
        'slow_mode_delay' => 'integer',
        'unrestrict_boost_count' => 'integer',
        'message_auto_delete_time' => 'integer',
        'has_aggressive_anti_spam_enabled' => 'boolean',
        'has_hidden_members' => 'boolean',
        'has_protected_content' => 'boolean',
        'has_visible_history' => 'boolean',
        'sticker_set_name' => 'string',
        'can_set_sticker_set' => 'boolean',
        'custom_emoji_sticker_set_name' => 'string',
        'linked_chat_id' => 'integer',
        'location' => 'ChatLocation',
    ];
}
