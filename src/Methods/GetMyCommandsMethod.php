<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotCommandScope;

class GetMyCommandsMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/getMyCommands",
            'send' => $this->send(),
            'expect' => [BotCommand::class],
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
