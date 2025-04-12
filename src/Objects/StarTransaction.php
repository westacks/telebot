<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a Telegram Star transaction. Note that if the buyer initiates a chargeback with the payment provider from whom they acquired Stars (e.g., Apple, Google) following this transaction, the refunded Stars will be deducted from the bot's balance. This is outside of Telegram's control.
 * @property-read string $id Unique identifier of the transaction. Coincides with the identifier of the original transaction for refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users.
 * @property-read int $amount Integer amount of Telegram Stars transferred by the transaction
 * @property-read ?int $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars transferred by the transaction; from 0 to 999999999
 * @property-read int $date Date the transaction was created in Unix time
 * @property-read ?TransactionPartner $source Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a failed withdrawal). Only for incoming transactions
 * @property-read ?TransactionPartner $receiver Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal). Only for outgoing transactions
 *
 * @see https://core.telegram.org/bots/api#startransaction
 */
class StarTransaction extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly int $amount,
        public readonly ?int $nanostar_amount,
        public readonly int $date,
        public readonly ?TransactionPartner $source,
        public readonly ?TransactionPartner $receiver,
    ) {
    }
}
