<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a transaction with an unknown source or recipient.
 * @property-read string $type Type of the transaction partner, always “other”
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerother
 */
class TransactionPartnerOther extends TelegramObject
{
    public function __construct(
        public readonly string $type,
    ) {
    }
}
