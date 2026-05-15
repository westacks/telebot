<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;

/**
 * Use this method to reply to a received guest message. On success, a SentGuestMessage object is returned.
 *
 * @property-read string $guest_query_id Unique identifier for the query to be answered
 * @property-read InlineQueryResult $result A JSON-serialized object describing the message to be sent
 *
 * @see https://core.telegram.org/bots/api#answerguestquery
 */
class AnswerGuestQueryMethod extends TelegramMethod
{
    protected string $method = 'answerGuestQuery';
    protected array $expect = ['SentGuestMessage'];

    public function __construct(
        public readonly string $guest_query_id,
        public readonly InlineQueryResult $result,
    ) {
    }
}
