<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Use this method to change the list of the bot's commands. See [this manual](https://core.telegram.org/bots/features#commands) for more details about bot commands. Returns True on success.
 *
 * @property BotCommand[]    $commands      __Required: Yes__. A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
 * @property BotCommandScope $scope         __Required: Optional__. A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault).
 * @property string          $language_code __Required: Optional__. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 */
class SetMyCommandsMethod extends TelegramMethod
{
    protected string $method = 'setMyCommands';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'commands' => 'BotCommand[]',
        'scope' => 'BotCommandScope',
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
