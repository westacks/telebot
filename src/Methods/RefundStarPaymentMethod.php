<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Refunds a successful payment in [Telegram Stars](https://t.me/BotNews/90). Returns True on success.
 *
 * @property int    $user_id                    __Required: Yes__. Identifier of the user whose payment will be refunded
 * @property string $telegram_payment_charge_id __Required: Yes__. Telegram payment identifier
 */
class RefundStarPaymentMethod extends TelegramMethod
{
    protected string $method = 'refundStarPayment';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'telegram_payment_charge_id' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
