<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a withdrawal transaction to the Telegram Ads platform.
 * @property-read string $type Type of the transaction partner, always “telegram_ads”
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramads
 */
class TransactionPartnerTelegramAds extends TransactionPartner
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
