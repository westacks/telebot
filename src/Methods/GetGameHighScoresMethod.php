<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Games\GameHighScore;

class GetGameHighScoresMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/getGameHighScores",
            'send' => $this->send(),
            'expect' => [GameHighScore::class],
        ];
    }

    private function send()
    {
        $parameters = [
            'user_id' => 'integer',
            'chat_id' => 'integer',
            'message_id' => 'integer',
            'inline_message_id' => 'string',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
