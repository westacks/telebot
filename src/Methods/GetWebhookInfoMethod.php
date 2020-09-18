<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\WebhookInfo;

class GetWebhookInfoMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/getWebhookInfo",
            'send'      => [],
            'expect'    => WebhookInfo::class
        ];
    }
}
