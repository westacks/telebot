<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains information about the affiliate that received a commission via this transaction.
 * @property-read ?User $affiliate_user Optional. The bot or the user that received an affiliate commission if it was received by a bot or a user
 * @property-read ?Chat $affiliate_chat Optional. The chat that received an affiliate commission if it was received by a chat
 * @property-read int $commission_per_mille The number of Telegram Stars received by the affiliate for each 1000 Telegram Stars received by the bot from referred users
 * @property-read int $amount Integer amount of Telegram Stars received by the affiliate from the transaction, rounded to 0; can be negative for refunds
 * @property-read ?int $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars received by the affiliate; from -999999999 to 999999999; can be negative for refunds
 *
 * @see https://core.telegram.org/bots/api#affiliateinfo
 */
class AffiliateInfo extends TelegramObject
{
    public function __construct(
        public readonly ?User $affiliate_user,
        public readonly ?Chat $affiliate_chat,
        public readonly int $commission_per_mille,
        public readonly int $amount,
        public readonly ?int $nanostar_amount,
    ) {
    }
}
