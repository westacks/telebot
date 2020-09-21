<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;

class PromoteChatMemberMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "https://api.telegram.org/bot{$this->token}/promoteChatMember",
            'send' => $this->send(),
            'expect' => 'boolean',
        ];
    }

    private function send()
    {
        $parameters = [
            'chat_id' => 'string',
            'user_id' => 'integer',
            'can_change_info' => 'boolean',
            'can_post_messages' => 'boolean',
            'can_edit_messages' => 'boolean',
            'can_delete_messages' => 'boolean',
            'can_invite_users' => 'boolean',
            'can_restrict_members' => 'boolean',
            'can_pin_messages' => 'boolean',
            'can_promote_members' => 'boolean',
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['json' => TypeCaster::stripArrays($object)];
    }
}
