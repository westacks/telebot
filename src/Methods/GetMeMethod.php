<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a [User](https://core.telegram.org/bots/api#user) object.
 */
class GetMeMethod extends TelegramMethod
{
    protected string $method = 'getMe';

    protected string $expect = 'User';

    protected array $parameters = [];
}
