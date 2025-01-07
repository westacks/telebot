<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to log out from the cloud Bot API server before launching the bot locally. You __must__ log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
 */
class LogOutMethod extends TelegramMethod
{
    protected string $method = 'logOut';

    protected string $expect = 'boolean';

    protected array $parameters = [];

    public function mock($arguments)
    {
        return true;
    }
}
