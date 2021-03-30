<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;

class SendPollMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/sendPoll",
            'send' => $this->send(),
            'expect' => Message::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'question' => 'string',
            'options' => ['string'],
            'is_anonymous' => 'boolean',
            'type' => 'string',
            'allows_multiple_answers' => 'boolean',
            'correct_option_id' => 'integer',
            'explanation' => 'string',
            'explanation_parse_mode' => 'string',
            'explanation_entities' => [MessageEntity::class],
            'open_period' => 'integer',
            'close_date' => 'integer',
            'is_closed' => 'boolean',
            'disable_notification' => 'boolean',
            'reply_to_message_id' => 'integer',
            'allow_sending_without_reply' => 'boolean',
            'reply_markup' => Keyboard::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
