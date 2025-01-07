<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\UserChatBoosts;

/**
 * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a [UserChatBoosts](https://core.telegram.org/bots/api#userchatboosts) object.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the chat or username of the channel (in the format @channelusername)
 * @property int    $user_id __Required: Yes__. Unique identifier of the target user
 */
class GetUserChatBoostsMethod extends TelegramMethod
{
    protected string $method = 'getUserChatBoosts';

    protected string $expect = 'UserChatBoosts';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
    ];

    public function mock($arguments)
    {
        return new UserChatBoosts([
            'boosts' => [],
        ]);
    }
}
