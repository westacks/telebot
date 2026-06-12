<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to process a received chat join request query. Returns True on success.
 *
 * @property-read string $chat_join_request_query_id Unique identifier of the join request query
 * @property-read string $result Result of the query. Must be either “approve” to allow the user to join the chat, “decline” to disallow the user to join the chat, or “queue” to leave the decision to other administrators.
 *
 * @see https://core.telegram.org/bots/api#answerchatjoinrequestquery
 */
class AnswerChatJoinRequestQueryMethod extends TelegramMethod
{
    protected string $method = 'answerChatJoinRequestQuery';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $chat_join_request_query_id,
        public readonly string $result,
    ) {
    }
}
