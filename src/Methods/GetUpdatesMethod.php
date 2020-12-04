<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Update;

class GetUpdatesMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/getUpdates",
            'send' => $this->send(),
            'expect' => [Update::class],
        ];
    }

    private function send()
    {
        $parameters = [
            'offset' => 'integer',
            'limit' => 'integer',
            'timeout' => 'integer',
            'allowed_updates' => ['string'],
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
