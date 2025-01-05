<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an [Update](https://core.telegram.org/bots/api#update) with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. __Note:__ The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
 *
 * @property string $pre_checkout_query_id __Required: Yes__. Unique identifier for the query to be answered
 * @property bool   $ok                    __Required: Yes__. Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. Use False if there are any problems.
 * @property string $error_message         __Required: Optional__. Required if ok is False. Error message in human readable form that explains the reason for failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to the user.
 */
class AnswerPreCheckoutQueryMethod extends TelegramMethod
{
    protected string $method = 'answerPreCheckoutQuery';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'pre_checkout_query_id' => 'string',
        'ok' => 'boolean',
        'error_message' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
