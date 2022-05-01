<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to get current webhook status. Requires no parameters. On success, returns a [WebhookInfo](https://core.telegram.org/bots/api#webhookinfo) object. If the bot is using [getUpdates](https://core.telegram.org/bots/api#getupdates), will return an object with the url field empty.
 */
class GetWebhookInfoMethod extends TelegramMethod
{
    protected string $method = 'getWebhookInfo';

    protected string $expect = 'WebhookInfo';

    protected array $parameters = [];
}
