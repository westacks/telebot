<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents one shipping option.
 *
 * @property string              $id     Shipping option identifier
 * @property string              $title  Option title
 * @property Array<LabeledPrice> $prices List of price portions
 */
class ShippingOption extends TelegramObject
{
    protected function relations()
    {
        return [
            'id' => 'string',
            'title' => 'string',
            'prices' => [LabeledPrice::class],
        ];
    }
}
