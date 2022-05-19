<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\User;

/**
 * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a [User](https://core.telegram.org/bots/api#user) object.
 */
class GetMeMethod extends TelegramMethod
{
    protected string $method = 'getMe';

    protected string $expect = 'User';

    protected array $parameters = [];

    public function mock($arguments)
    {
        return new User([
            'id' => '123456789',
            'first_name' => 'First',
            'last_name' => 'Last',
            'username' => 'username',
            'is_bot' => true,
        ]);
    }
}
