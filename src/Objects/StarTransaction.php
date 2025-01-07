<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Describes a Telegram Star transaction.
 *
 * @property string                                                                                                                                                                   $id              Unique identifier of the transaction. Coincides with the identifier of the original transaction for refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users.
 * @property int                                                                                                                                                                      $amount          Integer amount of Telegram Stars transferred by the transaction
 * @property int                                                                                                                                                                      $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars transferred by the transaction; from 0 to 999999999
 * @property int                                                                                                                                                                      $date            Date the transaction was created in Unix time
 * @property TransactionPartnerAffiliateProgram|TransactionPartnerFragment|TransactionPartnerOther|TransactionPartnerTelegramAds|TransactionPartnerTelegramApi|TransactionPartnerUser $source          Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a failed withdrawal). Only for incoming transactions
 * @property TransactionPartnerAffiliateProgram|TransactionPartnerFragment|TransactionPartnerOther|TransactionPartnerTelegramAds|TransactionPartnerTelegramApi|TransactionPartnerUser $receiver        Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal). Only for outgoing transactions
 */
class StarTransaction extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'amount' => 'integer',
        'nanostar_amount' => 'integer',
        'date' => 'integer',
        'source' => 'TransactionPartner',
        'receiver' => 'TransactionPartner',
    ];
}
