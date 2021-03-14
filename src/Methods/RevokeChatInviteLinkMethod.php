<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatInviteLink;

class RevokeChatInviteLinkMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/revokeChatInviteLink",
            'send' => $this->send(),
            'expect' => ChatInviteLink::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'invite_link' => 'string',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
