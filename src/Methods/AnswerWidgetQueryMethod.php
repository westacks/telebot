<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to send an answer to a query from a widget. The query must be answered within 15 seconds. The answer is received only by the widget that sent the query and doesn't change data of the widget; use editMessageWidgetData or editSharedWidgetData to change it. On success, True is returned.
 *
 * @property-read string $widget_query_id Unique identifier for the query to be answered
 * @property-read ?string $data Data to be returned to the widget, 0-1024 bytes
 *
 * @see https://core.telegram.org/bots/api#answerwidgetquery
 */
class AnswerWidgetQueryMethod extends TelegramMethod
{
    protected string $method = 'answerWidgetQuery';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $widget_query_id,
        public readonly ?string $data,
    ) {
    }
}
