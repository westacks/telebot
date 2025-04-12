<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains full information about a chat.
 * @property-read int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property-read ?string $title Optional. Title, for supergroups, channels and group chats
 * @property-read ?string $username Optional. Username, for private chats, supergroups and channels if available
 * @property-read ?string $first_name Optional. First name of the other party in a private chat
 * @property-read ?string $last_name Optional. Last name of the other party in a private chat
 * @property-read ?true $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
 * @property-read int $accent_color_id Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header, and link preview. See accent colors for more details.
 * @property-read int $max_reaction_count The maximum number of reactions that can be set on a message in the chat
 * @property-read ?ChatPhoto $photo Optional. Chat photo
 * @property-read ?string[] $active_usernames Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels
 * @property-read ?Birthdate $birthdate Optional. For private chats, the date of birth of the user
 * @property-read ?BusinessIntro $business_intro Optional. For private chats with business accounts, the intro of the business
 * @property-read ?BusinessLocation $business_location Optional. For private chats with business accounts, the location of the business
 * @property-read ?BusinessOpeningHours $business_opening_hours Optional. For private chats with business accounts, the opening hours of the business
 * @property-read ?Chat $personal_chat Optional. For private chats, the personal channel of the user
 * @property-read ?ReactionType[] $available_reactions Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed.
 * @property-read ?string $background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for the reply header and link preview background
 * @property-read ?int $profile_accent_color_id Optional. Identifier of the accent color for the chat's profile background. See profile accent colors for more details.
 * @property-read ?string $profile_background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background
 * @property-read ?string $emoji_status_custom_emoji_id Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat
 * @property-read ?int $emoji_status_expiration_date Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time, if any
 * @property-read ?string $bio Optional. Bio of the other party in a private chat
 * @property-read ?true $has_private_forwards Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user
 * @property-read ?true $has_restricted_voice_and_video_messages Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat
 * @property-read ?true $join_to_send_messages Optional. True, if users need to join the supergroup before they can send messages
 * @property-read ?true $join_by_request Optional. True, if all users directly joining the supergroup without using an invite link need to be approved by supergroup administrators
 * @property-read ?string $description Optional. Description, for groups, supergroups and channel chats
 * @property-read ?string $invite_link Optional. Primary invite link, for groups, supergroups and channel chats
 * @property-read ?Message $pinned_message Optional. The most recent pinned message (by sending date)
 * @property-read ?ChatPermissions $permissions Optional. Default chat member permissions, for groups and supergroups
 * @property-read AcceptedGiftTypes $accepted_gift_types Information about types of gifts that are accepted by the chat or by the corresponding user for private chats
 * @property-read ?true $can_send_paid_media Optional. True, if paid media messages can be sent or forwarded to the channel chat. The field is available only for channel chats.
 * @property-read ?int $slow_mode_delay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged user; in seconds
 * @property-read ?int $unrestrict_boost_count Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to ignore slow mode and chat permissions
 * @property-read ?int $message_auto_delete_time Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds
 * @property-read ?true $has_aggressive_anti_spam_enabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators.
 * @property-read ?true $has_hidden_members Optional. True, if non-administrators can only get the list of bots and administrators in the chat
 * @property-read ?true $has_protected_content Optional. True, if messages from the chat can't be forwarded to other chats
 * @property-read ?true $has_visible_history Optional. True, if new chat members will have access to old messages; available only to chat administrators
 * @property-read ?string $sticker_set_name Optional. For supergroups, name of the group sticker set
 * @property-read ?true $can_set_sticker_set Optional. True, if the bot can change the group sticker set
 * @property-read ?string $custom_emoji_sticker_set_name Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be used by all users and bots in the group.
 * @property-read ?int $linked_chat_id Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property-read ?ChatLocation $location Optional. For supergroups, the location to which the supergroup is connected
 *
 * @see https://core.telegram.org/bots/api#chatfullinfo
 */
class ChatFullInfo extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly ?string $title,
        public readonly ?string $username,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?true $is_forum,
        public readonly int $accent_color_id,
        public readonly int $max_reaction_count,
        public readonly ?ChatPhoto $photo,
        public readonly ?array $active_usernames,
        public readonly ?Birthdate $birthdate,
        public readonly ?BusinessIntro $business_intro,
        public readonly ?BusinessLocation $business_location,
        public readonly ?BusinessOpeningHours $business_opening_hours,
        public readonly ?Chat $personal_chat,
        public readonly ?array $available_reactions,
        public readonly ?string $background_custom_emoji_id,
        public readonly ?int $profile_accent_color_id,
        public readonly ?string $profile_background_custom_emoji_id,
        public readonly ?string $emoji_status_custom_emoji_id,
        public readonly ?int $emoji_status_expiration_date,
        public readonly ?string $bio,
        public readonly ?true $has_private_forwards,
        public readonly ?true $has_restricted_voice_and_video_messages,
        public readonly ?true $join_to_send_messages,
        public readonly ?true $join_by_request,
        public readonly ?string $description,
        public readonly ?string $invite_link,
        public readonly ?Message $pinned_message,
        public readonly ?ChatPermissions $permissions,
        public readonly AcceptedGiftTypes $accepted_gift_types,
        public readonly ?true $can_send_paid_media,
        public readonly ?int $slow_mode_delay,
        public readonly ?int $unrestrict_boost_count,
        public readonly ?int $message_auto_delete_time,
        public readonly ?true $has_aggressive_anti_spam_enabled,
        public readonly ?true $has_hidden_members,
        public readonly ?true $has_protected_content,
        public readonly ?true $has_visible_history,
        public readonly ?string $sticker_set_name,
        public readonly ?true $can_set_sticker_set,
        public readonly ?string $custom_emoji_sticker_set_name,
        public readonly ?int $linked_chat_id,
        public readonly ?ChatLocation $location,
    ) {
    }
}
