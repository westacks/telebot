<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;

class EditMessageLiveLocationMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/editMessageLiveLocation",
            'send' => $this->send(),
            'expect' => Message::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'message_id' => 'integer',
            'inline_message_id' => 'string',
            'latitude' => 'float',
            'longitude' => 'float',
            'horizontal_accuracy' => 'float',
            'heading' => 'integer',
            'proximity_alert_radius' => 'integer',
            'reply_markup' => InlineKeyboardMarkup::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
