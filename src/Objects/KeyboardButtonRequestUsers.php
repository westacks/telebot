<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object defines the criteria used to request suitable users. Information about the selected users will be shared with the bot when the corresponding button is pressed. More about requesting users »
 * @property-read int $request_id Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within the message
 * @property-read ?bool $user_is_bot Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional restrictions are applied.
 * @property-read ?bool $user_is_premium Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no additional restrictions are applied.
 * @property-read ?int $max_quantity Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
 * @property-read ?bool $request_name Optional. Pass True to request the users' first and last names
 * @property-read ?bool $request_username Optional. Pass True to request the users' usernames
 * @property-read ?bool $request_photo Optional. Pass True to request the users' photos
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestusers
 */
class KeyboardButtonRequestUsers extends TelegramObject
{
    public function __construct(
        public readonly int $request_id,
        public readonly ?bool $user_is_bot,
        public readonly ?bool $user_is_premium,
        public readonly ?int $max_quantity,
        public readonly ?bool $request_name,
        public readonly ?bool $request_username,
        public readonly ?bool $request_photo,
    ) {
    }
}
