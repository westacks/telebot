<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to remove webhook integration if you decide to switch back to [getUpdates](https://core.telegram.org/bots/api#getupdates). Returns True on success.
 *
 * @property bool $drop_pending_updates __Required: Optional__. Pass True to drop all pending updates
 */
class DeleteWebhookMethod extends TelegramMethod
{
    protected string $method = 'deleteWebhook';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'drop_pending_updates' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
