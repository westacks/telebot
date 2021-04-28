<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\Payments\LabeledPrice;

class SendInvoiceMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/sendInvoice",
            'send' => $this->send(),
            'expect' => Message::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'title' => 'string',
            'description' => 'string',
            'payload' => 'string',
            'provider_token' => 'string',
            'start_parameter' => 'string',
            'currency' => 'string',
            'prices' => [LabeledPrice::class],
            'max_tip_amount' => 'integer',
            'suggested_tip_amounts' => array('integer'),
            'provider_data' => 'string',
            'photo_url' => 'string',
            'photo_size' => 'integer',
            'photo_width' => 'integer',
            'photo_height' => 'integer',
            'need_name' => 'boolean',
            'need_phone_number' => 'boolean',
            'need_email' => 'boolean',
            'need_shipping_address' => 'boolean',
            'send_phone_number_to_provider' => 'boolean',
            'send_email_to_provider' => 'boolean',
            'is_flexible' => 'boolean',
            'disable_notification' => 'boolean',
            'reply_to_message_id' => 'integer',
            'allow_sending_without_reply' => 'boolean',
            'reply_markup' => Keyboard::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
