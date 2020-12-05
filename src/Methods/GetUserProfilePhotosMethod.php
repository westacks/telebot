<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\UserProfilePhotos;

class GetUserProfilePhotosMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/getUserProfilePhotos",
            'send' => $this->send(),
            'expect' => UserProfilePhotos::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'user_id' => 'integer',
            'offset' => 'integer',
            'limit' => 'integer',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
