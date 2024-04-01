<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a [KeyboardButtonRequestUsers](https://core.telegram.org/bots/api#keyboardbuttonrequestusers) button.
 *
 * @property int          $request_id Identifier of the request
 * @property SharedUser[] $users      Information about users shared with the bot.
 */
class UsersShared extends TelegramObject
{
    protected $attributes = [
        'request_id' => 'integer',
        'users' => 'SharedUser[]',
    ];
}
