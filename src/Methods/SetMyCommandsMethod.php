<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Use this method to change the list of the bot's commands. See this manual for more details about bot commands. Returns True on success.
 *
 * @property-read BotCommand[] $commands A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
 * @property-read ?BotCommandScope $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
 * @property-read ?string $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 *
 * @see https://core.telegram.org/bots/api#setmycommands
 */
class SetMyCommandsMethod extends TelegramMethod
{
    protected string $method = 'setMyCommands';
    protected array $expect = ['true'];

    public function __construct(
        public readonly array $commands,
        public readonly ?BotCommandScope $scope,
        public readonly ?string $language_code,
    ) {
    }
}
