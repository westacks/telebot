<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions. Currently, it can be one of
 *
 * - [TransactionPartnerUser](https://core.telegram.org/bots/api#transactionpartneruser)
 * - [TransactionPartnerAffiliateProgram](https://core.telegram.org/bots/api#transactionpartneraffiliateprogram)
 * - [TransactionPartnerFragment](https://core.telegram.org/bots/api#transactionpartnerfragment)
 * - [TransactionPartnerTelegramAds](https://core.telegram.org/bots/api#transactionpartnertelegramads)
 * - [TransactionPartnerTelegramApi](https://core.telegram.org/bots/api#transactionpartnertelegramapi)
 * - [TransactionPartnerOther](https://core.telegram.org/bots/api#transactionpartnerother)
 */
abstract class TransactionPartner extends TelegramObject
{
    protected static $types = [
        'user' => TransactionPartnerUser::class,
        'affiliate_program' => TransactionPartnerAffiliateProgram::class,
        'fragment' => TransactionPartnerFragment::class,
        'telegram_ads' => TransactionPartnerTelegramAds::class,
        'telegram_api' => TransactionPartnerTelegramApi::class,
        'other' => TransactionPartnerOther::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        if ($class = static::$types[$object['type'] ?? null] ?? null) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
