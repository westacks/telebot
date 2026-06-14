<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Returns the list of gifts that can be sent by the bot to users and channel chats. Requires no parameters. Returns a Gifts object.
 *
 *
 * @see https://core.telegram.org/bots/api#getavailablegifts
 */
class GetAvailableGiftsMethod extends TelegramMethod
{
    protected string $method = 'getAvailableGifts';
    protected array $expect = [];

    public function __construct()
    {
    }
}
