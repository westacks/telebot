<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a regular gift that was sent or received.
 * @property-read Gift $gift Information about the gift
 * @property-read ?string $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received on behalf of business accounts
 * @property-read ?int $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver by converting the gift; omitted if conversion to Telegram Stars is impossible
 * @property-read ?int $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were prepaid for the ability to upgrade the gift
 * @property-read ?true $is_upgrade_separate Optional. True, if the gift's upgrade was purchased after the gift was sent
 * @property-read ?true $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift
 * @property-read ?string $text Optional. Text of the message that was added to the gift
 * @property-read ?MessageEntity[] $entities Optional. Special entities that appear in the text
 * @property-read ?true $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone will be able to see them
 * @property-read ?int $unique_gift_number Optional. Unique number reserved for this gift when upgraded. See the number field in UniqueGift.
 *
 * @see https://core.telegram.org/bots/api#giftinfo
 */
class GiftInfo extends TelegramObject
{
    public function __construct(
        public readonly Gift $gift,
        public readonly ?string $owned_gift_id,
        public readonly ?int $convert_star_count,
        public readonly ?int $prepaid_upgrade_star_count,
        public readonly ?true $is_upgrade_separate,
        public readonly ?true $can_be_upgraded,
        public readonly ?string $text,
        public readonly ?array $entities,
        public readonly ?true $is_private,
        public readonly ?int $unique_gift_number,
    ) {
    }
}
