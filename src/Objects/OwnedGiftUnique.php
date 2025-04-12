<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a unique gift received and owned by a user or a chat.
 * @property-read string $type Type of the gift, always “unique”
 * @property-read UniqueGift $gift Information about the unique gift
 * @property-read ?string $owned_gift_id Optional. Unique identifier of the received gift for the bot; for gifts received on behalf of business accounts only
 * @property-read ?User $sender_user Optional. Sender of the gift if it is a known user
 * @property-read int $send_date Date the gift was sent in Unix time
 * @property-read ?true $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf of business accounts only
 * @property-read ?true $can_be_transferred Optional. True, if the gift can be transferred to another owner; for gifts received on behalf of business accounts only
 * @property-read ?int $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot transfer the gift
 *
 * @see https://core.telegram.org/bots/api#ownedgiftunique
 */
class OwnedGiftUnique extends OwnedGift
{
    public function __construct(
        public readonly string $type,
        public readonly UniqueGift $gift,
        public readonly ?string $owned_gift_id,
        public readonly ?User $sender_user,
        public readonly int $send_date,
        public readonly ?true $is_saved,
        public readonly ?true $can_be_transferred,
        public readonly ?int $transfer_star_count,
    ) {
    }
}
