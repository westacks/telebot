<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
 *
 * @property-read string $shipping_query_id Unique identifier for the query to be answered
 * @property-read bool $ok Pass True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
 * @property-read ?ShippingOption[] $shipping_options Required if ok is True. A JSON-serialized array of available shipping options.
 * @property-read ?string $error_message Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. “Sorry, delivery to your desired address is unavailable”). Telegram will display this message to the user.
 *
 * @see https://core.telegram.org/bots/api#answershippingquery
 */
class AnswerShippingQueryMethod extends TelegramMethod
{
    protected string $method = 'answerShippingQuery';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $shipping_query_id,
        public readonly bool $ok,
        public readonly ?array $shipping_options,
        public readonly ?string $error_message,
    ) {
    }
}
