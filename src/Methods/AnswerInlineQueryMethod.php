<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResultsButton;

/**
 * Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
 *
 * @property-read string $inline_query_id Unique identifier for the answered query
 * @property-read InlineQueryResult[] $results A JSON-serialized array of results for the inline query
 * @property-read ?int $cache_time The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 300.
 * @property-read ?bool $is_personal Pass True if results may be cached on the server side only for the user that sent the query. By default, results may be returned to any user who sends the same query.
 * @property-read ?string $next_offset Pass the offset that a client should send in the next query with the same text to receive more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes.
 * @property-read ?InlineQueryResultsButton $button A JSON-serialized object describing a button to be shown above inline query results
 *
 * @see https://core.telegram.org/bots/api#answerinlinequery
 */
class AnswerInlineQueryMethod extends TelegramMethod
{
    protected string $method = 'answerInlineQuery';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $inline_query_id,
        public readonly array $results,
        public readonly ?int $cache_time,
        public readonly ?bool $is_personal,
        public readonly ?string $next_offset,
        public readonly ?InlineQueryResultsButton $button,
    ) {
    }
}
