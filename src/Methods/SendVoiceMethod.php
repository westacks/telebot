<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;

class SendVoiceMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/sendVoice",
            'send' => $this->send(),
            'expect' => Message::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'voice' => InputFile::class,
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'duration' => 'integer',
            'disable_notification' => 'boolean',
            'reply_to_message_id' => 'integer',
            'allow_sending_without_reply' => 'boolean',
            'reply_markup' => Keyboard::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['multipart' => TypeCaster::flatten($object)];
    }
}
