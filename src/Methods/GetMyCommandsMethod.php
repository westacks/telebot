<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of [BotCommand](https://core.telegram.org/bots/api#botcommand) objects. If commands aren't set, an empty list is returned.
 *
 * @property BotCommandScope $scope         __Required: Optional__. A JSON-serialized object, describing scope of users. Defaults to [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault).
 * @property string          $language_code __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 */
class GetMyCommandsMethod extends TelegramMethod
{
    protected string $method = 'getMyCommands';

    protected string $expect = 'BotCommand[]';

    protected array $parameters = [
        'scope' => 'BotCommandScope',
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return [
            new BotCommand([
                'command' => 'command',
                'description' => 'description',
            ]),
        ];
    }
}
