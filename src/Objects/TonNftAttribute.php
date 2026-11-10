<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an attribute of an NFT in the TON blockchain.
 * @property-read string $trait_type Trait type of the attribute
 * @property-read string $value Value of the attribute
 *
 * @see https://core.telegram.org/bots/api#tonnftattribute
 */
class TonNftAttribute extends TelegramObject
{
    public function __construct(
        public readonly string $trait_type,
        public readonly string $value,
    ) {
    }
}
