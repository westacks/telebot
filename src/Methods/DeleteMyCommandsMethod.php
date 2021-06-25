<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;

class DeleteMyCommandsMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/deleteMyCommands",
            'send' => $this->send(),
            'expect' => 'boolean',
        ];
    }

    private function send()
    {
        $parameters = [
            'scope' => BotCommandScope::class,
            'language_code' => 'string',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
