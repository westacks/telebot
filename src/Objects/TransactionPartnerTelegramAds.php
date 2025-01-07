<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a withdrawal transaction to the Telegram Ads platform.
 *
 * @property string $type Type of the transaction partner, always “telegram_ads”
 */
class TransactionPartnerTelegramAds extends TransactionPartner
{
    protected $attributes = [
        'type' => 'string',
    ];
}
