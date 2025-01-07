<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InlineQueryResultsButton;

/**
 * Use this method to send answers to an inline query. On success, True is returned. No more than __50__ results per query are allowed.
 *
 * @property string                   $inline_query_id __Required: Yes__. Unique identifier for the answered query
 * @property InlineQueryResult[]      $results         __Required: Yes__. A JSON-serialized array of results for the inline query
 * @property int                      $cache_time      __Required: Optional__. The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 300.
 * @property bool                     $is_personal     __Required: Optional__. Pass True if results may be cached on the server side only for the user that sent the query. By default, results may be returned to any user who sends the same query.
 * @property string                   $next_offset     __Required: Optional__. Pass the offset that a client should send in the next query with the same text to receive more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes.
 * @property InlineQueryResultsButton $button          __Required: Optional__. A JSON-serialized object describing a button to be shown above inline query results
 */
class AnswerInlineQueryMethod extends TelegramMethod
{
    protected string $method = 'answerInlineQuery';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'inline_query_id' => 'string',
        'results' => 'InlineQueryResult[]',
        'cache_time' => 'integer',
        'is_personal' => 'boolean',
        'next_offset' => 'string',
        'button' => 'InlineQueryResultsButton',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
