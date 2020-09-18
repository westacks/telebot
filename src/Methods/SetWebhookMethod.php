<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

class SetWebhookMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/setWebhook",
            'send'      => $this->send(),
            'expect'    => 'boolean'
        ];
    }

    private function send()
    {
        $parameters = [
            'url'                       => 'string',
            'certificate'               => InputFile::class,
            'max_connections'           => 'integer',
            'allowed_updates'           => array('string')
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);
        return [ 'multipart' => TypeCaster::flatten($object) ];
    }
}
