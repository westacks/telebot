<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Refunds a successful payment in Telegram Stars. Returns True on success.
 *
 * @property-read int $user_id Identifier of the user whose payment will be refunded
 * @property-read string $telegram_payment_charge_id Telegram payment identifier
 *
 * @see https://core.telegram.org/bots/api#refundstarpayment
 */
class RefundStarPaymentMethod extends TelegramMethod
{
    protected string $method = 'refundStarPayment';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly string $telegram_payment_charge_id,
    ) {
    }
}
