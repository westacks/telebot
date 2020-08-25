<?php

namespace WeStacks\TeleBot\TelegramObject\Payments;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents a portion of the price for goods or services.
 * 
 * @property String           $label             Portion label
 * @property Integer          $amount            Price of the product in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * 
 * @package WeStacks\TeleBot\TelegramObject\Payments
 */
class LabeledPrice extends TelegramObject
{
    protected function relations()
    {
        return [
            'label'     => 'string',
            'amount'    => 'integer'
        ];
    }
}