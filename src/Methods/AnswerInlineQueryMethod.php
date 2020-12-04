<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;

class AnswerInlineQueryMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/answerInlineQuery",
            'send' => $this->send(),
            'expect' => 'boolean',
        ];
    }

    private function send()
    {
        $parameters = [
            'inline_query_id' => 'string',
            'results' => [InlineQueryResult::class],
            'cache_time' => 'integer',
            'is_personal' => 'boolean',
            'next_offset' => 'string',
            'switch_pm_text' => 'string',
            'switch_pm_parameter' => 'string',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
