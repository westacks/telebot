<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;

class EditMessageMediaMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/editMessageMedia",
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
            'media' => InputMedia::class,
            'reply_markup' => Keyboard::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['multipart' => TypeCaster::flatten($object)];
    }
}
