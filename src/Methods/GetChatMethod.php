<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Chat;

/**
 * Use this method to get up-to-date information about the chat. Returns a [ChatFullInfo](https://core.telegram.org/bots/api#chatfullinfo) object on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 */
class GetChatMethod extends TelegramMethod
{
    protected string $method = 'getChat';

    protected string $expect = 'ChatFullInfo';

    protected array $parameters = [
        'chat_id' => 'string',
    ];

    public function mock($arguments)
    {
        return new Chat([
            'id' => $arguments['chat_id'],
            'type' => [
                'private',
                'group',
                'supergroup',
                'channel',
            ][rand(0, 3)],
        ]);
    }
}
