<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, [higher level commands](https://core.telegram.org/bots/api#determining-list-of-commands) will be shown to affected users. Returns True on success.
 *
 * @property BotCommandScope $scope         __Required: Optional__. A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault).
 * @property string          $language_code __Required: Optional__. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 */
class DeleteMyCommandsMethod extends TelegramMethod
{
    protected string $method = 'deleteMyCommands';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'scope' => 'BotCommandScope',
        'language_code' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
