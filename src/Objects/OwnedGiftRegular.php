<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a regular gift owned by a user or a chat.
 * @property-read string $type Type of the gift, always “regular”
 * @property-read Gift $gift Information about the regular gift
 * @property-read ?string $owned_gift_id Optional. Unique identifier of the gift for the bot; for gifts received on behalf of business accounts only
 * @property-read ?User $sender_user Optional. Sender of the gift if it is a known user
 * @property-read int $send_date Date the gift was sent in Unix time
 * @property-read ?string $text Optional. Text of the message that was added to the gift
 * @property-read ?MessageEntity[] $entities Optional. Special entities that appear in the text
 * @property-read ?true $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone will be able to see them
 * @property-read ?true $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf of business accounts only
 * @property-read ?true $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift; for gifts received on behalf of business accounts only
 * @property-read ?true $was_refunded Optional. True, if the gift was refunded and isn't available anymore
 * @property-read ?int $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver instead of the gift; omitted if the gift cannot be converted to Telegram Stars
 * @property-read ?int $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were paid by the sender for the ability to upgrade the gift
 *
 * @see https://core.telegram.org/bots/api#ownedgiftregular
 */
class OwnedGiftRegular extends OwnedGift
{
    public function __construct(
        public readonly string $type,
        public readonly Gift $gift,
        public readonly ?string $owned_gift_id,
        public readonly ?User $sender_user,
        public readonly int $send_date,
        public readonly ?string $text,
        public readonly ?array $entities,
        public readonly ?true $is_private,
        public readonly ?true $is_saved,
        public readonly ?true $can_be_upgraded,
        public readonly ?true $was_refunded,
        public readonly ?int $convert_star_count,
        public readonly ?int $prepaid_upgrade_star_count,
    ) {
    }
}
