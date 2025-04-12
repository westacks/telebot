<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a list of boosts added to a chat by a user.
 * @property-read ChatBoost[] $boosts The list of boosts added to the chat by the user
 *
 * @see https://core.telegram.org/bots/api#userchatboosts
 */
class UserChatBoosts extends TelegramObject
{
    public function __construct(
        public readonly array $boosts,
    ) {
    }
}
