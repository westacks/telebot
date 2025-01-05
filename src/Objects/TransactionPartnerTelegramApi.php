<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a transaction with payment for [paid broadcasting](https://core.telegram.org/bots/api#paid-broadcasts).
 *
 * @property string $type          Type of the transaction partner, always “telegram_api”
 * @property int    $request_count The number of successful requests that exceeded regular limits and were therefore billed
 */
class TransactionPartnerTelegramApi extends TransactionPartner
{
    protected $attributes = [
        'type' => 'string',
        'request_count' => 'integer',
    ];
}
