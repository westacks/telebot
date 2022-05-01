<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents one shipping option.
 *
 * @property string         $id     Shipping option identifier
 * @property string         $title  Option title
 * @property LabeledPrice[] $prices List of price portions
 */
class ShippingOption extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'title' => 'string',
        'prices' => 'LabeledPrice[]',
    ];
}
