<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\WebhookInfo;

/**
 * Use this method to get current webhook status. Requires no parameters. On success, returns a [WebhookInfo](https://core.telegram.org/bots/api#webhookinfo) object. If the bot is using [getUpdates](https://core.telegram.org/bots/api#getupdates), will return an object with the url field empty.
 */
class GetWebhookInfoMethod extends TelegramMethod
{
    protected string $method = 'getWebhookInfo';

    protected string $expect = 'WebhookInfo';

    protected array $parameters = [];

    public function mock($arguments)
    {
        return new WebhookInfo([
            'url' => 'https://example.com/webhook',
            'has_custom_certificate' => true,
            'pending_update_count' => 1,
            'last_error_date' => 1,
            'last_error_message' => 'last_error_message',
            'max_connections' => 1,
            'allowed_updates' => [
                'message',
            ],
        ]);
    }
}
