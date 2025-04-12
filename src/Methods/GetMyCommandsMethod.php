<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
 *
 * @property-read ?BotCommandScope $scope A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
 * @property-read ?string $language_code A two-letter ISO 639-1 language code or an empty string
 *
 * @see https://core.telegram.org/bots/api#getmycommands
 */
class GetMyCommandsMethod extends TelegramMethod
{
    protected string $method = 'getMyCommands';
    protected array $expect = ['BotCommand[]'];

    public function __construct(
        public readonly ?BotCommandScope $scope,
        public readonly ?string $language_code,
    ) {
    }
}
