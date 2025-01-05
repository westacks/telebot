<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about a user that was shared with the bot using a [KeyboardButtonRequestUsers](https://core.telegram.org/bots/api#keyboardbuttonrequestusers) button.
 *
 * @property int         $user_id    Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so 64-bit integers or double-precision float types are safe for storing these identifiers. The bot may not have access to the user and could be unable to use this identifier, unless the user is already known to the bot by some other means.
 * @property string      $first_name Optional. First name of the user, if the name was requested by the bot
 * @property string      $last_name  Optional. Last name of the user, if the name was requested by the bot
 * @property string      $username   Optional. Username of the user, if the username was requested by the bot
 * @property PhotoSize[] $photo      Optional. Available sizes of the chat photo, if the photo was requested by the bot
 */
class SharedUser extends TelegramObject
{
    protected $attributes = [
        'user_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'username' => 'string',
        'photo' => 'PhotoSize[]',
    ];
}
