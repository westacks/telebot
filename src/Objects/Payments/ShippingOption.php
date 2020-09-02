<?php

namespace WeStacks\TeleBot\Objects\Payments;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents one shipping option.
 * 
 * @property String                    $id                    Shipping option identifier
 * @property String                    $title                 Option title
 * @property Array<LabeledPrice>       $prices                List of price portions
 * 
 * @package WeStacks\TeleBot\Objects\Payments
 */
class ShippingOption extends TelegramObject
{
    protected function relations()
    {
        return [
            'id'        => 'string',
            'title'     => 'string',
            'prices'    => array(LabeledPrice::class)
        ];
    }
}