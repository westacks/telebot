<?php

namespace WeStacks\TeleBot\TelegramMethod;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\TelegramMethod;
use WeStacks\TeleBot\TelegramObject\Keyboard;
use WeStacks\TeleBot\TelegramObject\Message;

class SendMessageMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/sendMessage",
            'send'      => $this->send(),
            'expect'    => Message::class,
            'callback'  => $this->callback
        ];
    }

    private function parameters()
    {
        return [
            'chat_id'                   => 'string',
            'text'                      => 'string',
            'parse_mode'                => 'string',
            'disable_web_page_preview'  => 'boolean',
            'disable_notification'      => 'boolean',
            'reply_to_message_id'       => 'integer',
            'reply_markup'              => Keyboard::class
        ];
    }

    private function send()
    {
        $validObject = TypeCaster::castValues($this->arguments[0] ?? [], $this->parameters());
        return [
            'json' => TypeCaster::stripArrays($validObject)
        ];
    }
}