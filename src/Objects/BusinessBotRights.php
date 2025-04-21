<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents the rights of a business bot.
 * @property-read ?true $can_reply Optional. True, if the bot can send and edit messages in the private chats that had incoming messages in the last 24 hours
 * @property-read ?true $can_read_messages Optional. True, if the bot can mark incoming private messages as read
 * @property-read ?true $can_delete_sent_messages Optional. True, if the bot can delete messages sent by the bot
 * @property-read ?true $can_delete_all_messages Optional. True, if the bot can delete all private messages in managed chats
 * @property-read ?true $can_edit_name Optional. True, if the bot can edit the first and last name of the business account
 * @property-read ?true $can_edit_bio Optional. True, if the bot can edit the bio of the business account
 * @property-read ?true $can_edit_profile_photo Optional. True, if the bot can edit the profile photo of the business account
 * @property-read ?true $can_edit_username Optional. True, if the bot can edit the username of the business account
 * @property-read ?true $can_change_gift_settings Optional. True, if the bot can change the privacy settings pertaining to gifts for the business account
 * @property-read ?true $can_view_gifts_and_stars Optional. True, if the bot can view gifts and the amount of Telegram Stars owned by the business account
 * @property-read ?true $can_convert_gifts_to_stars Optional. True, if the bot can convert regular gifts owned by the business account to Telegram Stars
 * @property-read ?true $can_transfer_and_upgrade_gifts Optional. True, if the bot can transfer and upgrade gifts owned by the business account
 * @property-read ?true $can_transfer_stars Optional. True, if the bot can transfer Telegram Stars received by the business account to its own account, or use them to upgrade and transfer gifts
 * @property-read ?true $can_manage_stories Optional. True, if the bot can post, edit and delete stories on behalf of the business account
 *
 * @see https://core.telegram.org/bots/api#businessbotrights
 */
class BusinessBotRights extends TelegramObject
{
    public ?true $can_delete_outgoing_messages;

    public function __construct(
        public readonly ?true $can_reply,
        public readonly ?true $can_read_messages,
        public readonly ?true $can_delete_sent_messages,
        public readonly ?true $can_delete_all_messages,
        public readonly ?true $can_edit_name,
        public readonly ?true $can_edit_bio,
        public readonly ?true $can_edit_profile_photo,
        public readonly ?true $can_edit_username,
        public readonly ?true $can_change_gift_settings,
        public readonly ?true $can_view_gifts_and_stars,
        public readonly ?true $can_convert_gifts_to_stars,
        public readonly ?true $can_transfer_and_upgrade_gifts,
        public readonly ?true $can_transfer_stars,
        public readonly ?true $can_manage_stories,
    ) {
    }
}
