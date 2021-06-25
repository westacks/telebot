<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;

class BanChatMemberMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/banChatMember",
            'send' => $this->send(),
            'expect' => 'boolean',
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'user_id' => 'integer',
            'until_date' => 'integer',
            'revoke_messages' => 'boolean',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
