<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotCommandScope;

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
            'scope' => BotCommandScope::class,
            'language_code' => 'string',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
