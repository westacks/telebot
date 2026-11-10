<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to edit public data of a shared widget created by the bot. A shared widget can be edited at most once per second. On success, True is returned.
 *
 * @property-read string $widget_id Unique identifier of the shared widget
 * @property-read string $public_data New public data of the widget, 0-1024 bytes; pass an empty string to remove the public data
 * @property-read ?int $cache_time The maximum amount of time in seconds that the public data of the widget may be cached client-side; 5-3600. If omitted, then the current value is kept, which is 30 by default.
 *
 * @see https://core.telegram.org/bots/api#editsharedwidgetdata
 */
class EditSharedWidgetDataMethod extends TelegramMethod
{
    protected string $method = 'editSharedWidgetData';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $widget_id,
        public readonly string $public_data,
        public readonly ?int $cache_time,
    ) {
    }
}
