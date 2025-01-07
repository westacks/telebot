<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a transaction with a user.
 *
 * @property string        $type                Type of the transaction partner, always “user”
 * @property User          $user                Information about the user
 * @property AffiliateInfo $affiliate           Optional. Information about the affiliate that received a commission via this transaction
 * @property string        $invoice_payload     Optional. Bot-specified invoice payload
 * @property int           $subscription_period Optional. The duration of the paid subscription
 * @property PaidMedia[]   $paid_media          Optional. Information about the paid media bought by the user
 * @property string        $paid_media_payload  Optional. Bot-specified paid media payload
 * @property Gift          $gift                Optional. The gift sent to the user by the bot
 */
class TransactionPartnerUser extends TransactionPartner
{
    protected $attributes = [
        'type' => 'string',
        'user' => 'User',
        'affiliate' => 'AffiliateInfo',
        'invoice_payload' => 'string',
        'subscription_period' => 'integer',
        'paid_media' => 'PaidMedia[]',
        'paid_media_payload' => 'string',
        'gift' => 'Gift',
    ];
}
