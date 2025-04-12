<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\BotCommandScope;

/**
 * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
 *
 * @property-read ?BotCommandScope $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
 * @property-read ?string $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 *
 * @see https://core.telegram.org/bots/api#deletemycommands
 */
class DeleteMyCommandsMethod extends TelegramMethod
{
    protected string $method = 'deleteMyCommands';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?BotCommandScope $scope,
        public readonly ?string $language_code,
    ) {
    }
}
