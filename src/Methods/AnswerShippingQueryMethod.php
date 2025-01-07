<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ShippingOption;

/**
 * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an [Update](https://core.telegram.org/bots/api#update) with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
 *
 * @property string           $shipping_query_id __Required: Yes__. Unique identifier for the query to be answered
 * @property bool             $ok                __Required: Yes__. Pass True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
 * @property ShippingOption[] $shipping_options  __Required: Optional__. Required if ok is True. A JSON-serialized array of available shipping options.
 * @property string           $error_message     __Required: Optional__. Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the user.
 */
class AnswerShippingQueryMethod extends TelegramMethod
{
    protected string $method = 'answerShippingQuery';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'shipping_query_id' => 'string',
        'ok' => 'boolean',
        'shipping_options' => 'ShippingOption[]',
        'error_message' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
