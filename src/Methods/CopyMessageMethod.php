<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\MessageId;

class CopyMessageMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/copyMessage",
            'send' => $this->send(),
            'expect' => MessageId::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'from_chat_id' => 'string',
            'message_id' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'disable_notification' => 'boolean',
            'reply_to_message_id' => 'integer',
            'allow_sending_without_reply' => 'boolean',
            'reply_markup' => Keyboard::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
