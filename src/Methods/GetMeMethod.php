<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * A simple method for testing your bot's authentication token. Requires no parameters. Returns information about the bot in the form of a BotFullInfo object.
 *
 *
 * @see https://core.telegram.org/bots/api#getme
 */
class GetMeMethod extends TelegramMethod
{
    protected string $method = 'getMe';
    protected array $expect = ['BotFullInfo'];

    public function __construct()
    {
    }
}
