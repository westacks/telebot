<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the model of a unique gift.
 * @property-read string $name Name of the model
 * @property-read Sticker $sticker The sticker that represents the unique gift
 * @property-read int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gift upgrades. Always 0 for crafted gifts.
 * @property-read ?string $rarity Optional. Rarity of the model if it is a crafted model. Currently, can be “uncommon”, “rare”, “epic”, or “legendary”.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftmodel
 */
class UniqueGiftModel extends TelegramObject
{
    public function __construct(
        public readonly string $name,
        public readonly Sticker $sticker,
        public readonly int $rarity_per_mille,
        public readonly ?string $rarity,
    ) {
    }
}
