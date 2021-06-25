<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;

class GetChatMemberCountMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/getChatMemberCount",
            'send' => $this->send(),
            'expect' => 'integer',
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
