<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a gift received and owned by a user or a chat. Currently, it can be one of
 * - [OwnedGiftRegular](https://core.telegram.org/bots/api#ownedgiftregular)
 * - [OwnedGiftUnique](https://core.telegram.org/bots/api#ownedgiftunique)
 *
 * @see https://core.telegram.org/bots/api#ownedgift
 */
abstract class OwnedGift extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'regular' => OwnedGiftRegular::class,
            'unique' => OwnedGiftUnique::class,
            default => throw new \InvalidArgumentException("Unknown OwnedGift: ".$parameters['type']),
        };
    }
}
