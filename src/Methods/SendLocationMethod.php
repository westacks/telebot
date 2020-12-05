<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;

class SendLocationMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/sendLocation",
            'send' => $this->send(),
            'expect' => Message::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'latitude' => 'float',
            'longitude' => 'float',
            'horizontal_accuracy' => 'float',
            'live_period' => 'integer',
            'heading' => 'integer',
            'proximity_alert_radius' => 'integer',
            'disable_notification' => 'boolean',
            'reply_to_message_id' => 'integer',
            'allow_sending_without_reply' => 'boolean',
            'reply_markup' => Keyboard::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
