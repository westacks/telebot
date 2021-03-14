<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatInviteLink;

class EditChatInviteLinkMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/editChatInviteLink",
            'send' => $this->send(),
            'expect' => ChatInviteLink::class,
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'invite_link' => 'string',
            'expire_date' => 'integer',
            'member_limit' => 'integer',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
