<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the backdrop of a unique gift.
 * @property-read string $name Name of the backdrop
 * @property-read UniqueGiftBackdropColors $colors Colors of the backdrop
 * @property-read int $rarity_per_mille The number of unique gifts that receive this backdrop for every 1000 gifts upgraded
 *
 * @see https://core.telegram.org/bots/api#uniquegiftbackdrop
 */
class UniqueGiftBackdrop extends TelegramObject
{
    public function __construct(
        public readonly string $name,
        public readonly UniqueGiftBackdropColors $colors,
        public readonly int $rarity_per_mille,
    ) {
    }
}
