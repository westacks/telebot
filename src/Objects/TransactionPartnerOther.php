<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a transaction with an unknown source or recipient.
 *
 * @property string $type Type of the transaction partner, always “other”
 */
class TransactionPartnerOther extends TransactionPartner
{
    protected $attributes = [
        'type' => 'string',
    ];
}
