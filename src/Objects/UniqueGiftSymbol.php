<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the symbol shown on the pattern of a unique gift.
 * @property-read string $name Name of the symbol
 * @property-read Sticker $sticker The sticker that represents the unique gift
 * @property-read int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
 *
 * @see https://core.telegram.org/bots/api#uniquegiftsymbol
 */
class UniqueGiftSymbol extends TelegramObject
{
    public function __construct(
        public readonly string $name,
        public readonly Sticker $sticker,
        public readonly int $rarity_per_mille,
    ) {
    }
}
