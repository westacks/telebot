<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get the list of backdrops, which can be used as the background of a theme of the screen for sharing a link to a user or a chat. Requires no parameters. Returns a ChatShareThemeBackdrops object.
 *
 *
 * @see https://core.telegram.org/bots/api#getchatsharethemebackdrops
 */
class GetChatShareThemeBackdropsMethod extends TelegramMethod
{
    protected string $method = 'getChatShareThemeBackdrops';
    protected array $expect = ['ChatShareThemeBackdrops'];
}
