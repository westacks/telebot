<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\SentWebAppMessage;

/**
 * Use this method to set the result of an interaction with a [Web App](https://core.telegram.org/bots/webapps) and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a [SentWebAppMessage](https://core.telegram.org/bots/api#sentwebappmessage) object is returned.
 *
 * @property string            $web_app_query_id __Required: Yes__. Unique identifier for the query to be answered
 * @property InlineQueryResult $result           __Required: Yes__. A JSON-serialized object describing the message to be sent
 */
class AnswerWebAppQueryMethod extends TelegramMethod
{
    protected string $method = 'answerWebAppQuery';

    protected string $expect = 'SentWebAppMessage';

    protected array $parameters = [
        'web_app_query_id' => 'string',
        'result' => 'InlineQueryResult',
    ];

    public function mock($arguments)
    {
        return new SentWebAppMessage([
            'inline_message_id' => '1234567890',
        ]);
    }
}
