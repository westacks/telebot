<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;

/**
 * Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
 *
 * @property-read string $web_app_query_id Unique identifier for the query to be answered
 * @property-read InlineQueryResult $result A JSON-serialized object describing the message to be sent
 *
 * @see https://core.telegram.org/bots/api#answerwebappquery
 */
class AnswerWebAppQueryMethod extends TelegramMethod
{
    protected string $method = 'answerWebAppQuery';
    protected array $expect = ['SentWebAppMessage'];

    public function __construct(
        public readonly string $web_app_query_id,
        public readonly InlineQueryResult $result,
    ) {
    }
}
