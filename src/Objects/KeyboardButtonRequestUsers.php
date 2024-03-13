<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared with the bot when the corresponding button is pressed.
 *
 * @property int $request_id Signed 32-bit identifier of the request, which will be received back in the UsersShared object. Must be unique within the message
 * @property bool $user_is_bot Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional restrictions are applied.
 * @property bool $user_is_premium Optional. Pass True to request a premium user, pass False to request a non-premium user. If not specified, no additional restrictions are applied.
 * @property int $max_quantity Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
 */
class KeyboardButtonRequestUsers extends TelegramObject
{
    protected $attributes = [
        'request_id' => 'integer',
        'user_is_bot' => 'boolean',
        'user_is_premium' => 'boolean',
        'max_quantity' => 'integer',
    ];
}
