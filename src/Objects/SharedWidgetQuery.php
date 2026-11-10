<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an incoming query from a forwarded message with a shared widget created by the bot. Use answerWidgetQuery to answer the query. Each user can send at most 5 queries per 5 seconds to the bot from all its widgets.
 * @property-read string $id Unique identifier for this query
 * @property-read User $from Sender
 * @property-read WidgetQueryType $type Type of the query
 * @property-read string $data Data of the query, 1-64 bytes
 * @property-read string $widget_id Unique identifier of the shared widget, which sent the query
 *
 * @see https://core.telegram.org/bots/api#sharedwidgetquery
 */
class SharedWidgetQuery extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly WidgetQueryType $type,
        public readonly string $data,
        public readonly string $widget_id,
    ) {
    }
}
