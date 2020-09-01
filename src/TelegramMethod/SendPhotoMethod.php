<?php

namespace WeStacks\TeleBot\TelegramMethod;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\TelegramMethod;
use WeStacks\TeleBot\TelegramObject\InputFile;
use WeStacks\TeleBot\TelegramObject\Message;

class SendPhotoMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type'      => 'POST',
            'url'       => "https://api.telegram.org/bot{$this->token}/sendPhoto",
            'send'      => $this->send(),
            'expect'    => Message::class
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id'                   => 'string',
            'photo'                     => InputFile::class,
            'caption'                   => 'string',
            'parse_mode'                => 'string',
            'disable_notification'      => 'boolean',
            'reply_to_message_id'       => 'integer',
            'reply_markup'              => Keyboard::class 
        ];

        $validObject = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        $multipart = [];

        foreach ($validObject as $key => $value)
        {
            if($value instanceof InputFile)
            {
                $multipart[] = $value->toMultipart($key);
            }
            else {
                $multipart[] = [
                    'name' => $key,
                    'contents' => (string) $value
                ];
            }
        }

        return [ 'multipart' => $multipart ];
    }
}