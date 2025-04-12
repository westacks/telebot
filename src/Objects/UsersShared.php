<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 * @property-read int $request_id Identifier of the request
 * @property-read SharedUser[] $users Information about users shared with the bot.
 *
 * @see https://core.telegram.org/bots/api#usersshared
 */
class UsersShared extends TelegramObject
{
    public function __construct(
        public readonly int $request_id,
        public readonly array $users,
    ) {
    }
}
