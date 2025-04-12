<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one shipping option.
 * @property-read string $id Shipping option identifier
 * @property-read string $title Option title
 * @property-read LabeledPrice[] $prices List of price portions
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly array $prices,
    ) {
    }
}
