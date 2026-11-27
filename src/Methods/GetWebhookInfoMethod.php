<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, it will return an object with the url field empty.
 *
 *
 * @see https://core.telegram.org/bots/api#getwebhookinfo
 */
class GetWebhookInfoMethod extends TelegramMethod
{
    protected string $method = 'getWebhookInfo';
    protected array $expect = ['WebhookInfo'];

    public function __construct()
    {
    }
}
