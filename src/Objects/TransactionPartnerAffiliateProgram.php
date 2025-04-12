<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes the affiliate program that issued the affiliate commission received via this transaction.
 * @property-read string $type Type of the transaction partner, always “affiliate_program”
 * @property-read ?User $sponsor_user Optional. Information about the bot that sponsored the affiliate program
 * @property-read int $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by the affiliate program sponsor from referred users
 *
 * @see https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 */
class TransactionPartnerAffiliateProgram extends TransactionPartner
{
    public function __construct(
        public readonly string $type,
        public readonly ?User $sponsor_user,
        public readonly int $commission_per_mille,
    ) {
    }
}
