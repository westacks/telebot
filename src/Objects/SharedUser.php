<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
 * @property-read int $user_id Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so 64-bit integers or double-precision float types are safe for storing these identifiers. The bot may not have access to the user and could be unable to use this identifier, unless the user is already known to the bot by some other means.
 * @property-read ?string $first_name Optional. First name of the user, if the name was requested by the bot
 * @property-read ?string $last_name Optional. Last name of the user, if the name was requested by the bot
 * @property-read ?string $username Optional. Username of the user, if the username was requested by the bot
 * @property-read ?PhotoSize[] $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
 *
 * @see https://core.telegram.org/bots/api#shareduser
 */
class SharedUser extends TelegramObject
{
    public function __construct(
        public readonly int $user_id,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $username,
        public readonly ?array $photo,
    ) {
    }
}
