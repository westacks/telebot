<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;

class SetMyCommandsMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/setMyCommands",
            'send' => $this->send(),
            'expect' => 'boolean',
        ];
    }

    private function send()
    {
        $parameters = [
            'commands' => [BotCommand::class],
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
