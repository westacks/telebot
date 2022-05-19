<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to get the number of members in a chat. Returns Int on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 */
class GetChatMemberCountMethod extends TelegramMethod
{
    protected string $method = 'getChatMemberCount';

    protected string $expect = 'integer';

    protected array $parameters = [
        'chat_id' => 'string',
    ];

    public function mock($arguments)
    {
        return rand(1, 100);
    }
}
