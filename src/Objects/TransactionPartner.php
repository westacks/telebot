<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions. Currently, it can be one of
 * - [TransactionPartnerUser](https://core.telegram.org/bots/api#transactionpartneruser)
 * - [TransactionPartnerChat](https://core.telegram.org/bots/api#transactionpartnerchat)
 * - [TransactionPartnerAffiliateProgram](https://core.telegram.org/bots/api#transactionpartneraffiliateprogram)
 * - [TransactionPartnerFragment](https://core.telegram.org/bots/api#transactionpartnerfragment)
 * - [TransactionPartnerTelegramAds](https://core.telegram.org/bots/api#transactionpartnertelegramads)
 * - [TransactionPartnerTelegramApi](https://core.telegram.org/bots/api#transactionpartnertelegramapi)
 * - [TransactionPartnerOther](https://core.telegram.org/bots/api#transactionpartnerother)
 *
 * @see https://core.telegram.org/bots/api#transactionpartner
 */
abstract class TransactionPartner extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'user' => TransactionPartnerUser::class,
            'chat' => TransactionPartnerChat::class,
            'affiliate_program' => TransactionPartnerAffiliateProgram::class,
            'fragment' => TransactionPartnerFragment::class,
            'telegram_ads' => TransactionPartnerTelegramAds::class,
            'telegram_api' => TransactionPartnerTelegramApi::class,
            'other' => TransactionPartnerOther::class,
            default => throw new \InvalidArgumentException("Unknown TransactionPartner: ".$parameters['type']),
        };
    }
}
