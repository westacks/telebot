<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a transaction with payment for paid broadcasting.
 * @property-read string $type Type of the transaction partner, always “telegram_api”
 * @property-read int $request_count The number of successful requests that exceeded regular limits and were therefore billed
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramapi
 */
class TransactionPartnerTelegramApi extends TransactionPartner
{
    public function __construct(
        public readonly string $type,
        public readonly int $request_count,
    ) {
    }
}
