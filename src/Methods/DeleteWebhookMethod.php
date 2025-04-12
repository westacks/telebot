<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
 *
 * @property-read ?bool $drop_pending_updates Pass True to drop all pending updates
 *
 * @see https://core.telegram.org/bots/api#deletewebhook
 */
class DeleteWebhookMethod extends TelegramMethod
{
    protected string $method = 'deleteWebhook';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?bool $drop_pending_updates,
    ) {
    }
}
