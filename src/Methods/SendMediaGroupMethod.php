<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\Message;

class SendMediaGroupMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/sendMediaGroup",
            'send'      => $this->send(),
            'expect'    => Message::class
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id'                   => 'integer',
            'media'                     => array(InputMedia::class),
            'disable_notification'      => 'boolean',
            'reply_to_message_id'       => 'integer'
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);
        return [ 'multipart' => TypeCaster::flatten($object) ];
    }
}