<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes the affiliate program that issued the affiliate commission received via this transaction.
 *
 * @property string $type                 Type of the transaction partner, always “affiliate_program”
 * @property User   $sponsor_user         Optional. Information about the bot that sponsored the affiliate program
 * @property int    $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by the affiliate program sponsor from referred users
 */
class TransactionPartnerAffiliateProgram extends TransactionPartner
{
    protected $attributes = [
        'type' => 'string',
        'sponsor_user' => 'User',
        'commission_per_mille' => 'integer',
    ];
}
