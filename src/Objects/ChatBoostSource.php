<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the source of a chat boost. It can be one of
 * - [ChatBoostSourcePremium](https://core.telegram.org/bots/api#chatboostsourcepremium)
 * - [ChatBoostSourceGiftCode](https://core.telegram.org/bots/api#chatboostsourcegiftcode)
 * - [ChatBoostSourceGiveaway](https://core.telegram.org/bots/api#chatboostsourcegiveaway)
 *
 * @see https://core.telegram.org/bots/api#chatboostsource
 */
abstract class ChatBoostSource extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['source']) {
            'premium' => ChatBoostSourcePremium::class,
            'gift_code' => ChatBoostSourceGiftCode::class,
            'giveaway' => ChatBoostSourceGiveaway::class,
            default => throw new \InvalidArgumentException("Unknown ChatBoostSource: ".$parameters['source']),
        };
    }
}
